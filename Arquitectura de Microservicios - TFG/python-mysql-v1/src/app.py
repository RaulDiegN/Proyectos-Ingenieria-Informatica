from flask import Flask, jsonify
from usuario import edades

app = Flask(__name__)

@app.route('/', methods=['GET'])
def ping():
    return jsonify({"response": "hello world"})

@app.route('/edades', methods=['GET'])
def users2():
    return jsonify({"Las edades de los usuarios son": edades})

if __name__== '__main__':
    app.run(host = "0.0.0.0", port="4000", debug=True)