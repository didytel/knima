<?php

require "callapi.php";

$a = (isset($_GET['a'])) ? $_GET['a'] : "";

switch ($a) {
    case "submit":
        $tag = (isset($_POST['tag'])) ? $_POST['tag'] : "";
        $ext = (isset($_POST['ext'])) ? $_POST['ext'] : "";
        $baseImage = (isset($_POST['baseImage'])) ? $_POST['baseImage'] : "";
        $workflow = basename($_FILES["workflow"]["name"]);
        var_dump($_FILES);
        if(!empty($tag) && !empty($baseImage)){
            //create dir struct
            $pathname = __DIR__."/build-files/$tag";
            if(mkdir($pathname, 0777, true)){
                $dockerfile = "FROM $baseImage \nCOPY app/ /app \n";
                if(!empty($ext)){
                    $dockerfile.= "RUN install-knime-extension $ext \n"; //org.knime.features.ext.birt.feature.group
                }
                $dockerfile.= "CMD [\"run\", \"$workflow\"]";

                chdir($pathname);
                file_put_contents("Dockerfile", $dockerfile);

                $appPathname = $pathname."/app";
                mkdir($appPathname, 0777, true);
                $targetWfFile = $appPathname."/".$workflow;
                move_uploaded_file($_FILES["workflow"]["tmp_name"], $targetWfFile);

                //create files archive
                chdir("..");
                $tagArch = "$tag.tgz";
                exec("tar -C $pathname -czvf $tagArch .");
            }
        }
        // $v = CallAPI("DELETE", "http/images/test:knime_api");
        // var_dump($v);
        break;
}
?>
<div>
    <form action="?a=submit" method="post" enctype="multipart/form-data">
        <select name="baseImage" id="bsaImageSelect">
            <option value="" selected> - </option>
            <option value="knime:3.7.2-ubuntu">knime:3.7.2-ubuntu</option>
            <option value="knime:latest">knime:latest</option>
        </select>
        <input type="text" name="tag" id="tagText" placeholder="Please input image name">
        <input type="text" name="ext" id="extText" placeholder="Enter extensions (optional)">
        <input type="file" name="workflow" id="workflowFile">
        <input type="submit" value="Submit">
    </form>
</div>