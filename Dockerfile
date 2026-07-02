FROM php:8.2-cli-alpine

WORKDIR /app

# install wget
RUN apk add --no-cache wget

# download PHP files from GitHub
RUN wget -O upload.php https://raw.githubusercontent.com/bxbzzbbbm-cmyk/fantastic-guide/refs/heads/main/upload.php && \
    wget -O download.php https://raw.githubusercontent.com/bxbzzbbbm-cmyk/fantastic-guide/refs/heads/main/download.php && \
    wget -O go.php https://raw.githubusercontent.com/bxbzzbbbm-cmyk/fantastic-guide/refs/heads/main/go.php

# create upload folder
RUN mkdir -p uploads

# expose port 3001
EXPOSE 3001

# start PHP server
CMD ["php", "-S", "0.0.0.0:3001"]
