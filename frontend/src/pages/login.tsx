import axios from "axios";
import React, { useState } from "react"; 
import {Button} from '@mui/material';
import {TextField } from '@mui/material'
 
export default function Login()
{
    const [email,setEmail] = useState('');       //email → the current value of the state 
    const [password,setPassword] = useState(''); //setEmail → a function to update that value.
                                                 //At the beginning: email = '' .
                                                 //If you later call: setTitle('New email@..');  ==> email = 'New email@..'.
    const handleLogin = () => {
         //console.log("Email : " , email , " Password : " , password)
         axios.post('http://127.0.0.1:8000/api/login',{
                     email:email,
                     password:password
           }).then((response)=>{
                  console.log(response.data);
           }).catch((error)=> console.error(error));
                 
    }

     return(
        <div> 
             {/* input & libel from Material */}
             <TextField variant="standard" label="Email :" type="email" id="email" name="email" onChange={(e) => setEmail(e.target.value)} />
             <br/>
             <TextField variant="standard" label="Password :" type="password" id="password" name="password" onChange={(e) => setPassword(e.target.value)} />
             <br/>
             <br/>
             <Button variant="contained"  onClick={handleLogin}> Login </Button>
             
             
        </div>
     )
     
}