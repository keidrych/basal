# There already exists an excellent repo for Java Images, so rather than duplicate
# we're using their base image and adding layers ontop for better compatibility
#
# Alpine only images are available
# We only provide the unlimited versions for application flexibility

FROM anapsix/alpine-java:8_server-jdk_unlimited

MAINTAINER Keidrych Anton-Oates <keidrych@tayloredtechnology.net>

RUN apk --no-cache add curl htop ssmtp vim zip unzip

RUN curl -s "https://get.sdkman.io" > /tmp/sdkman && sed -i 's/5\.5\.9\+231/5\.5\.9\+239/' /tmp/sdkman && bash /tmp/sdkman && mkdir -p /ssmtp

ARG VFETCH=v0.1.1
RUN	curl --location -o /bin/fetch https://github.com/gruntwork-io/fetch/releases/download/$VFETCH/fetch_linux_amd64 && \
		chmod a+x /bin/fetch

ARG VS6=v1.19.1.1
RUN fetch --repo="https://github.com/just-containers/s6-overlay" --tag="$VS6" --release-asset="s6-overlay-amd64.tar.gz" /tmp/ && \
		tar xzf /tmp/s6-overlay-amd64.tar.gz -C /

ARG VCONFD=0.12.1
RUN fetch --repo="https://github.com/bacongobbler/confd" --tag="=v$VCONFD" --release-asset="confd-$VCONFD-linux-amd64" /usr/bin/ && \
		mv /usr/bin/confd-$VCONFD-linux-amd64 /usr/bin/confd && \
		chmod +x /usr/bin/confd

# S6 always uses /init to run
ENTRYPOINT ["/init"]

# Volumes
VOLUME ["/app"]

# Confd Configuration files
COPY confd/ /etc/confd/