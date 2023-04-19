from flask import Flask, request
import html
# import customlog #надо сделать импорт)
import customlog

app = Flask(__name__)
app.config["UPLOAD_FOLDER"] = "upload/"

def Upload():
    return '''
    <html>
     <body>
      <form action = "http://10.0.0.2:5000/" method="POST" 
      enctype="multipart/form-data">
       <input type="file" name="file">
       <input type="submit" value="Upload">
      </form>   
     </body>
    </html>'''

@app.route('/share')
def sharedFiles():
    getFile = request.args.get("filename").replace('/','').replace('\\', '')
    file = open(app.config['UPLOAD_FOLDER'] + getFile, "r")

    return file.read() 

@app.route('/', methods = ['GET', 'POST'])
def index():

    customlog.log()


    if request.method == 'POST':
        f = request.files['file']
        print(f)
        f.save(app.config["UPLOAD_FOLDER"] + f.filename)
        
        return ('''<h2>Файл: загружен!</h2><br>
        <a href="/">..Back</a><br>
        <a href="./share?filename=%s">See my file</a>''' % html.escape(f.filename))

    return Upload()



if __name__=='__main__':
    app.run(host="10.0.0.2", debug=True)