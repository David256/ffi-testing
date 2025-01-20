FROM debian:bookworm

RUN apt update && apt -y upgrade

RUN apt install -y wget git php gcc

WORKDIR /source

COPY src .

RUN gcc -shared -o our_fome_library.so -fPIC script.c

CMD ["sleep", "infinity"]
