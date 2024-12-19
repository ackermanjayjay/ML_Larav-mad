from fastapi import FastAPI, Request
from fastapi.middleware.cors import CORSMiddleware
from tree import calculation_tree

app = FastAPI()

origins = ["http://127.0.0.1:8080/"]

app.add_middleware(
    CORSMiddleware,
    allow_origins=origins,
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)


@app.get("/")
async def main():
       return {
           "result":"model ready"
       }


@app.get("/prediction/")
async def pred(numbers: Request):
    query_params = dict(numbers.query_params)
    result = calculation_tree(
        query_params.get("a"),
        query_params.get("b"),
        query_params.get("c"),
        query_params.get("d"),
        query_params.get("e"),
        query_params.get("f"),
    )
    return {"result": result}
