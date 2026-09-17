# build image
build:
	docker build -t php-exercise .

run:
	docker run -p 127.0.0.1:8000:8000 php-exercise