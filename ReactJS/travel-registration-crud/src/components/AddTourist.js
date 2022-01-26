import { useRef} from 'react';

import classes from './Tourist.module.css';

function AddTourist(){

    const nameRef = useRef('');
    const placeRef = useRef('');
    const emailRef = useRef('');
    const phoneRef = useRef('');
  
 
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
    alert('Tourist Added Successfully!');
    console.log(data);
    nameRef.current.value ='';
    placeRef.current.value= '';
    emailRef.current.value= '';
    phoneRef.current.value = '';
    
    }

  
    return (
    
      <div>
      <form onSubmit={addTouristHandler}>
          <div className={classes.control}>
          <label htmlFor='name'>Name</label>
          <input type='text' id='name' ref={nameRef} required/>
          </div>
          <div className={classes.control}>
          <label htmlFor='place'>Place</label>
          <input type='text' id='place' ref={placeRef} required />
          </div>
          <div className={classes.control}>
          <label htmlFor='email'>Email-Id</label>
          <input type='email' id='email' ref={emailRef} required/>
          </div>
          <div className={classes.control}>
          <label htmlFor='phone'>Phone No.</label>
          <input type='text' id='phone' ref={phoneRef} required/>
          </div>
          <div className={classes.actions}>
               <button type='submit'>Add Tourist</button> 
          </div>
   
      </form>
    
    </div>
    );
  }
  
  export default AddTourist;