import { Typography } from "@mui/material";
import React from "react";

export default function Dashboard(){
    // Récupération de la valeur depuis le localStorage
  const storedUser = localStorage.getItem("user");
  // Vérification : si storedUser existe, on le parse. Sinon, user = null
  const user = storedUser ? JSON.parse(storedUser) : null;


  
    return <>
    
    <div>
        <Typography variant="h1"> Hello {user ? user.name : "Guest"} 👋</Typography>
    </div>
    
    </>
    
}