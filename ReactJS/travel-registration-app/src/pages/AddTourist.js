import { useRef, useState, useEffect} from 'react';

import classes from './AddTourist.module.css';
import ViewTourist from './ViewTourist';

function AddTourist({tourist}){

  const nameRef = useRef('');
  const placeRef = useRef('');
  const emailRef = useRef('');
  const phoneRef = useRef('');

  const [tourists, setTourist] = useState([]);
 

  useEffect(() => {
    async function fetchTouristHandler(){
      try{
        const response = await fetch('http://localhost/yii/travel-registration/frontend/web/index.php/tourists');
        if(!response.ok){
          throw new Error('Something went wrong!');
        }
  
        const data = await response.json();
        setTourist(data);
      }
      catch (error) {
        console.log(error.message);
      }    
    }
    fetchTouristHandler();
  },[tourists]);
   

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
    <ViewTourist tourist={tourists}/>
  </div>
  );
}

export default AddTourist;