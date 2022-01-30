import React, { useState, useEffect } from "react";

import { useParams,useHistory} from "react-router-dom";

import classes from './Tourist.module.css';
import useInput from '../hooks/use-input';

const isTenNum = value => value.trim().length ===10;
const UpdateTourist = () => {
   const history = useHistory();
   const { touristId } = useParams();
   const[name, setTouristName] = useState('');
   const[place, setTouristPlace] = useState('');
   const[email_id, setTouristEmail] = useState('');
   const[phone_no, setTouristPhone] = useState('');

   const { 
    hasError: nameInputHasError,
    valueChangeHandler: nameChangeHandler,
    inputBlurHandler: nameBlurHandler,
    reset: resetNameInput,
 } = useInput(value => value.trim() !== ''); 

 const {
  hasError: placeInputHasError,
  valueChangeHandler: placeChangeHandler,
  inputBlurHandler: placeBlurHandler,
  reset: resetPlaceInput,
} = useInput(value => value.trim() !== ''); 

const {
    hasError: emailInputHasError,
    valueChangeHandler: emailChangeHandler,
    inputBlurHandler: emailBlurHandler,
    reset: resetEmailInput,
 } = useInput(value => value.includes('@')); 

 const {
  hasError: phoneNumberHasError, 
  valueChangeHandler:phoneNumberChangeHandler, 
  inputBlurHandler: phoneNumberBlurHandler ,
  reset: resetPhoneNumber,
 }= useInput(isTenNum);

 

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
        
         
          history.push("/");
          resetNameInput();
          resetPlaceInput();
          resetEmailInput();
          resetPhoneNumber();
         }

    const nameInputClasses = nameInputHasError
    ? 'form-control invalid' 
    : 'form-control';

    const placeInputClasses = placeInputHasError
    ? 'form-control invalid' 
    : 'form-control';

    const emailInputClasses = emailInputHasError
    ? 'form-control invalid' 
    : 'form-control';

    const phoneInputClasses = phoneNumberHasError
    ? 'form-control invalid' 
    : 'form-control';

         return(
            <div>      
        <form >
        <div className={nameInputClasses}>
        <label htmlFor='name'>Name</label>
        <input type='text' 
        value={name} 
        id='name' 
        onChange={(e) => setTouristName(e.target.value) && nameChangeHandler}
        onBlur={nameBlurHandler}
        />
        </div>

        <div className={placeInputClasses}>
        <label htmlFor='place'>Place</label>
        <input type='text' 
        id='place'  
        value={place}  
        onChange={(e) => setTouristPlace(e.target.value) && placeChangeHandler} 
        onBlur={placeBlurHandler}
        />
        </div>

        <div className={emailInputClasses}>
        <label htmlFor='email'>Email-Id</label>
        <input type='email' 
        id='email' 
        value={email_id} 
        onBlur={emailBlurHandler}
        onChange={(e) => setTouristEmail(e.target.value) && emailChangeHandler}
        
        />
        </div>
        <div className={phoneInputClasses}>
        <label htmlFor='phone'>Phone No.</label>
        <input type='text' 
        id='phone'  
        value={phone_no} 
        onBlur={phoneNumberBlurHandler}
        onChange={(e) => setTouristPhone(e.target.value) && phoneNumberChangeHandler} />
        </div>
        <div className={classes.actions}>
        <button onClick={submitHandler}  type='submit'>Update Tourist</button>
             
        </div>
 
    </form>
        </div>
    );

};

export default UpdateTourist;