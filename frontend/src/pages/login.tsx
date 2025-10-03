import React, { useState } from "react";  

export default function Login()
{
    const [email,setEmail] = useState('');       //email → the current value of the state 
    const [password,setPassword] = useState(''); //setEmail → a function to update that value.
                                                 //At the beginning: email = '' .
                                                 //If you later call: setTitle('New email@..');  ==> email = 'New email@..'.
    const handleLogin = () => {
         console.log("Email : " , email , " Password : " , password)
    }

     return(
        <div>
             <label className="email-field"> Email : </label>
             <input type="email" id="email" name="email" onChange={(e) => setEmail(e.target.value)} />
             <br/>
             <label className="password-field"> Password : </label>
             <input type="password" id="password" name="password" onChange={(e) => setPassword(e.target.value)} />

             <button onClick={handleLogin}> Login</button>
        </div>
     )
     
}