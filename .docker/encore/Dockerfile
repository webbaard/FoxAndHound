FROM risingstack/alpine:3.4-v6.7.0-4.0.0

WORKDIR /opt/app

# Install yarn
RUN mkdir -p /opt

ADD package.json /tmp/

# Install packages
RUN cd /tmp && yarn
RUN mkdir -p /opt/app && cd /opt/app && ln -s /tmp/node_modules

# Copy the code
ADD . /opt/app