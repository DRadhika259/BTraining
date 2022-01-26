import { useRef, useState } from "react";
import classes from './AddTourist.module.css';


const ViewTourist =({tourist}) =>{
  const[isTouristEdit, setTouristIsEdit] = useState(false);


  const idRef = useRef('');
  const nameRef = useRef('');
  const placeRef = useRef('');
  const emailRef = useRef('');
  const phoneRef = useRef('');

         function editTouristHandler(tourist){
           nameRef.current.value = tourist.name;
           placeRef.current.value = tourist.place;
           emailRef.current.value = tourist.email_id;
           phoneRef.current.value = tourist.phone_no;
           idRef.current.value = tourist.id;
          
           setTouristIsEdit(true);
         }

         async function submitHandler(){
         
          const updateTourist = {
            name: nameRef.current.value,
            place: placeRef.current.value,
            email_id: emailRef.current.value,
            phone_no: phoneRef.current.value,

          };

          const id = idRef.current.value;
          await fetch(`http://localhost/yii/travel-registration/frontend/web/index.php/tourists/${id}`,{
            method: 'PUT',
            headers:{
                'Content-Type' : 'application/json'

            },
            body:JSON.stringify(updateTourist),
               
          });

          nameRef.current.value = '';
          placeRef.current.value = '';
          emailRef.current.value = '';
          phoneRef.current.value = '';
          idRef.current.value = '';
         }

         async function deleteTouristHandler(object) {
          console.log(object);
          if(window.confirm('You are about to delete one record! Are you sure?')) {
            await fetch(`http://localhost/yii/travel-registration/frontend/web/index.php/tourists/${object.id}`, {
              method: 'DELETE',
              headers: {
                  'Content-type': 'application/json'
              }
            });
          }
          else {
            console.log('Tourist not deleted!');
          }
        }
            return(
        <div>      
    <form >
        <div className={classes.control}>
        <input type='hidden' id='name' ref={idRef} />

        <label htmlFor='name'>Name</label>
        <input type='text' id='name' ref={nameRef} />
        </div>
        <div className={classes.control}>
        <label htmlFor='place'>Place</label>
        <input type='text' id='place' ref={placeRef} />
        </div>
        <div className={classes.control}>
        <label htmlFor='email'>Email-Id</label>
        <input type='email' id='email' ref={emailRef} />
        </div>
        <div className={classes.control}>
        <label htmlFor='phone'>Phone No.</label>
        <input type='text' id='phone' ref={phoneRef} />
        </div>
        <div className={classes.actions}>
        {isTouristEdit && <button onClick={submitHandler}type='submit'>Update</button>}
             
        </div>
 
    </form>

       <div>
      <table border='true' style={{marginTop: '50px', marginLeft: '50px'}}>
        <thead>
              <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Place</th>
                  <th>Email ID</th>
                  <th>Phone No.</th>
                  <th colSpan={2}>Actions</th>
              </tr>
          </thead>
        <tbody>
            {tourist.map(tour => {
                return <tr key={tour.id}>
                    <td>{tour.id}</td>
                    <td>{tour.name}</td>
                    <td>{tour.place}</td>
                    <td>{tour.email_id}</td>
                    <td>{tour.phone_no}</td>
                    <td><button onClick={() => {editTouristHandler(tour)}}>
                        Update
                    </button></td>
                    <td><button onClick={() => {deleteTouristHandler(tour)}}>
                        Delete
                    </button></td>
                  </tr>
                  })}
                </tbody>
            </table>
            </div>
            </div>
            )
};

export default ViewTourist;