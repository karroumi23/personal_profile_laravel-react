import { Typography } from "@mui/material";
import React from "react";

export default function Dashboard(){
    // get the user value from localstorage 
  const storedUser = localStorage.getItem("user");
  // Vérification : si storedUser existe, on le parse. Sinon, user = null
  const user = storedUser ? JSON.parse(storedUser) : null; // ? :     = (ternary operator)→  if / else  
                                                           // JSON.parse(..) = Converts the 'string' to  'object'

  
    return <>
    
    <div>
        <Typography variant="h1"> Hello {user ? user.name : "Guest"} 👋</Typography>
    </div>
    
    </>
    
}