import React, { useState, useEffect } from "react";

import { useParams,useHistory} from "react-router-dom";

import classes from './Tourist.module.css';

const UpdateTourist = () => {
   const history = useHistory();
   const { touristId } = useParams();
   const[name, setTouristName] = useState('');
   const[place, setTouristPlace] = useState('');
   const[email_id, setTouristEmail] = useState('');
   const[phone_no, setTouristPhone] = useState('');

   useEffect(()=>{
       console.log(touristId);
   fetch("http://localhost/yii/travel-registration/frontend/web/index.php/tourists/"+touristId)
    
   .then((response) => response.json())
   .then((result) =>{
    setTouristName(result.name);
    setTouristPlace(result.place);
    setTouristEmail(result.email_id);
    setTouristPhone(result.phone_no);
    console.log(result.name);
   });
},[touristId]);

         async function submitHandler(event){
            event.preventDefault();
            const updateTourist = {
                
                name: name,
                place: place,
                email_id: email_id,
                phone_no: phone_no,
            };
           
          await fetch(`http://localhost/yii/travel-registration/frontend/web/index.php/tourists/${touristId}`,{
            method: 'PUT',
            headers:{
                'Content-Type' : 'application/json'

            },
            body:JSON.stringify(updateTourist),
               
          });
          console.log(updateTourist);
        
          alert('Tourist updated successfully');
          history.push("/");
       
         }

         return(
            <div>      
        <form >
        <div className={classes.control}>
       

        <label htmlFor='name'>Name</label>
        <input type='text' value={name} id='name' onChange={(e) => setTouristName(e.target.value)} />
        </div>
        <div className={classes.control}>
        <label htmlFor='place'>Place</label>
        <input type='text' id='place'  value={place}  onChange={(e) => setTouristPlace(e.target.value)} />
        </div>
        <div className={classes.control}>
        <label htmlFor='email'>Email-Id</label>
        <input type='email' id='email' value={email_id} onChange={(e) => setTouristEmail(e.target.value)}/>
        </div>
        <div className={classes.control}>
        <label htmlFor='phone'>Phone No.</label>
        <input type='text' id='phone'  value={phone_no} onChange={(e) => setTouristPhone(e.target.value)} />
        </div>
        <div className={classes.actions}>
        <button onClick={submitHandler}type='submit'>Update Tourist</button>
             
        </div>
 
    </form>
        </div>
    );

};

export default UpdateTourist;