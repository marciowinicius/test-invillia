# interview-shiporders

After initialization of containers, API Documentation can be checked here: http://localhost:8000/api/doc

### Requirements

- [Docker](https://www.docker.com/get-docker)
- [Docker compose](https://docs.docker.com/compose/install/)

***

To test follow the following instructions:

Load the containers in Docker Compose with the command: `docker-compose up` #Using the flag `-d` to mode deamon.  _P.s.: Wait for the installation of dependencies to be completed through the container symfony-composer._

Make a request POST to the resource http://localhost:8000/oauth/v2/token, with the sending of the following data to
the request parameters:

    grant_type=password
    client_id=1_3bcbxd9e24g0gk4swg0kwgcwg4o8k8g4g888kwc44gcc0gwwk4
    client_secret=4ok2x70rlfokc8g0wws8c8kwcokw80k44sg48goc0ok4w0so0k
    username=admin
    password=admin

You will receive a response like this:

    {
        "access_token":"MjgwMDUzYjUxMzVlNDAwMjNjMjA2N2Y1ZGI0M2VmMTA4NjM2ZDdmMTllZmJkOTAyZThiYzJhM2Y4MTBhMDcwOQ",
        "expires_in":3600,
        "token_type":"bearer",
        "scope":null,
        "refresh_token":"NzY4OGU3ZmE2OGU0NTdlMTA4ZGNmZDdhNTBkYmVkZDI5ODM3YjFmNDA3ZTIzYTY0MzM0Mzk3NjgwYzFiNGVjMQ"
    }
    
We can use the access token we just received to authenticate in the next requests.

Inserting the Header -> Authorization: Bearer MjgwMDUzYjUxMzVlNDAwMjNjMjA2N2Y1ZGI0M2VmMTA4NjM2ZDdmMTllZmJkOTAyZThiYzJhM2Y4MTBhMDcwOQ