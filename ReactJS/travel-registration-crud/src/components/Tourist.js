import React,{useEffect,useState} from 'react';

import './Tourist.module.css';

const Tourist = () => {
    const [tourist, setTourist] = useState([]);
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
        },[tourist]);

        const editTouristHandler = (tour) =>{
            window.location = '/updatetourist/' + tour.id;

        };

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
           <div className='container'>
          <table className='table table-striped table-hover'  border='true' style={{marginTop: '50px', marginLeft: '50px'}}>
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
               
                );
        
};

export default Tourist;