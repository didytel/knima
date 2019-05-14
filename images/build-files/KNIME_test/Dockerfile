FROM knime:3.7.2-ubuntu

COPY app/ /app

RUN install-knime-extension org.knime.features.ext.birt.feature.group

CMD ["run", "KNIME_hello-world.knwf"]
