import { useRef} from 'react';
import { useHistory } from 'react-router-dom';

import classes from './Tourist.module.css';
import useInput from '../hooks/use-input';

const isTenNum = value => value.trim().length ===10;
function AddTourist(){
  const history = useHistory();
    const nameRef = useRef('');
    const placeRef = useRef('');
    const emailRef = useRef('');
    const phoneRef = useRef('');
  
    const {
      value: enteredName,   
      hasError: nameInputHasError,
      valueChangeHandler: nameChangeHandler,
      inputBlurHandler: nameBlurHandler,
      reset: resetNameInput,
   } = useInput(value => value.trim() !== ''); 

   const {
    value: enteredPlace,  
    hasError: placeInputHasError,
    valueChangeHandler: placeChangeHandler,
    inputBlurHandler: placeBlurHandler,
    reset: resetPlaceInput,
 } = useInput(value => value.trim() !== ''); 
  
  const {
      value: enteredEmail, 
      hasError: emailInputHasError,
      valueChangeHandler: emailChangeHandler,
      inputBlurHandler: emailBlurHandler,
      reset: resetEmailInput,
   } = useInput(value => value.includes('@')); 

   const {
    value: enteredPhoneNumber,
    hasError: phoneNumberHasError, 
    valueChangeHandler:phoneNumberChangeHandler, 
    inputBlurHandler: phoneNumberBlurHandler ,
    reset: resetPhoneNumber,
   }= useInput(isTenNum);

   

 
    async function addTouristHandler(event){
  
      
      event.preventDefault();
  
      const addTourist = {
        name: nameRef.current.value,
        place: placeRef.current.value,
        email_id: emailRef.current.value,
        phone_no: phoneRef.current.value,
  
      };
      console.log(addTourist);
  
      const response = await fetch('http://localhost/yii/travel-registration/frontend/web/index.php/tourists',{
        
      method: 'POST',
      headers:{
        'Content-Type' : 'application/json'
    },
        body:JSON.stringify(addTourist),
       
    });
    const data = await response.json();
    console.log(data);
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

  
    return (
    
      <div>
      <form onSubmit={addTouristHandler}>
          <div className={nameInputClasses}>
          <label htmlFor='name'>Name</label>
          <input type='text' 
          id='name' 
          ref={nameRef} 
          onChange = {nameChangeHandler}
          onBlur={nameBlurHandler}
          value={enteredName}
          required/>
           {nameInputHasError&& 
            <p className='error-text'>Name must not be empty</p>}
          </div>

          <div className={placeInputClasses}>
          <label htmlFor='place'>Place</label>
          <input type='text' 
          id='place' 
          ref={placeRef} 
          onChange = {placeChangeHandler}
          onBlur={placeBlurHandler}
          value={enteredPlace}
          required />
            {placeInputHasError&& 
            <p className='error-text'>Place must not be empty</p>}
          </div>

          <div className={emailInputClasses}>
          <label htmlFor='email'>Email-Id</label>
          <input type='email' 
          id='email' 
          ref={emailRef} 
          onChange = {emailChangeHandler}
          value={enteredEmail}
          onBlur={emailBlurHandler}
          required
          />
           {emailInputHasError && 
            <p className='error-text'>Please enter a valid email</p>}
          </div>

          <div className={phoneInputClasses}>
          <label htmlFor='phone'>Phone No.</label>
          <input type='text'
           id='phone' 
           ref={phoneRef} 
           onChange = {phoneNumberChangeHandler}
            value={enteredPhoneNumber}
            onBlur={phoneNumberBlurHandler}
            required/>
            {phoneNumberHasError && 
            <p className='error-text'>Please enter a valid Phone Number</p>}
          </div>
          <div className={classes.actions}>
               <button type='submit'>Add Tourist</button> 
          </div>
   
      </form>
    
    </div>
    );
  }
  
  export default AddTourist;