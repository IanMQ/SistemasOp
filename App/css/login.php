body {
    font-family: 'Overpass', sans-serif;
    font-weight: normal;
    font-size: 100%;
    color: #1b262c;
    
    margin: 0;
    background-color: #0f4c75;
}

#contenedor {
    display: flex;
    align-items: center;
    justify-content: center;
    
    margin: 0;
    padding: 0;
    min-width: 100vw;
    min-height: 100vh;
    width: 100%;
    height: 100%;
}

#central {
    max-width: 320px;
    width: 100%;
}

.titulo {
    font-size: 250%;
    color:#bbe1fa;
    text-align: center;
    margin-bottom: 20px;
}

#login {
    width: 100%;
    padding: 50px 30px;
    background-color: #3282b8;
    
    -webkit-box-shadow: 0px 0px 5px 5px rgba(0,0,0,0.15);
    -moz-box-shadow: 0px 0px 5px 5px rgba(0,0,0,0.15);
    box-shadow: 0px 0px 5px 5px rgba(0,0,0,0.15);
    
    border-radius: 3px 3px 3px 3px;
    -moz-border-radius: 3px 3px 3px 3px;
    -webkit-border-radius: 3px 3px 3px 3px;
    
    box-sizing: border-box;
}

#login input {
    font-family: 'Overpass', sans-serif;
    font-size: 110%;
    color: #1b262c;
    
    display: block;
    width: 100%;
    height: 40px;
    
    margin-bottom: 10px;
    padding: 5px 5px 5px 10px;
    
    box-sizing: border-box;
    
    border: none;
    border-radius: 3px 3px 3px 3px;
    -moz-border-radius: 3px 3px 3px 3px;
    -webkit-border-radius: 3px 3px 3px 3px;
}

#login input::placeholder {
    font-family: 'Overpass', sans-serif;
   
}

#login button {
    font-family: 'Overpass', sans-serif;
    font-size: 110%;
    color:#1b262c;
    width: 100%;
    height: 40px;
    border: none;
    
    border-radius: 3px 3px 3px 3px;
    -moz-border-radius: 3px 3px 3px 3px;
    -webkit-border-radius: 3px 3px 3px 3px;
    
    background-color: #bbe1fa;
    
    margin-top: 10px;
}

#login button:hover {
    background-color: #0f4c75;
    color:#bbe1fa;
}

.pie-form {
    font-size: 90%;
    text-align: center;    
    margin-top: 15px;
}

.pie-form a {
    display: block;
    text-decoration: none;
    color: #bbe1fa;
    margin-bottom: 3px;
}

.pie-form a:hover {
    color: #0f4c75;
}

.inferior {
    margin-top: 10px;
    font-size: 90%;
    text-align: center;
}

.inferior a {
    display: block;
    text-decoration: none;
    color: #bbe1fa;
    margin-bottom: 3px;
}

.inferior a:hover {
    color: #3282b8;
}

#gif-background {
            position: fixed;
            top: 0;
            left: 0;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: -1000;
        }