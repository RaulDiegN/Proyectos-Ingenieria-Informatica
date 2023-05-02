import mysql.connector
import numpy as np

mydb = mysql.connector.connect(
  host="mysqldb",
  port="3306",
  user="root",
  passwd="root",
  database="db_personas",
  auth_plugin='mysql_native_password'
)

cursor = mydb.cursor()

cursor.execute("SELECT * FROM usuario")

array = cursor.fetchall()

edades = np.array(np.transpose(array)[3])
dni = np.array(np.transpose(array)[2])
edades = [int(i) for i in edades]
dni = [int(i) for i in dni]