import React,{useEffect,useState} from 'react';
import ReactPaginate from 'react-paginate';
import './Tourist.module.css';

const Tourist = () => {
    const [tourist, setTourist] = useState([]);
    async function settingTourist(event) {

        const response = await fetch(
            `http://localhost/yii/travel-registration/frontend/web/index.php/tourists?sort=${event.target.value}`
        );
        const data = await response.json();
        setTourist(data);

    }
    const [pageCount, setPageCount] = useState(0);

    let limit = 5;

    async function idChangeHandler (event) {
      
      const searchById = await fetch(
          `http://localhost/yii/travel-registration/frontend/web/index.php/tourists?filter[id]=${event.target.value}`
          );
          const idData = await searchById.json();
          console.log(idData);
          setTourist(idData);
  };

    async function nameChangeHandler (event) {
      
        const searchByName = await fetch(
            `http://localhost/yii/travel-registration/frontend/web/index.php/tourists?filter[name][like]=${event.target.value}`
            );
            const nameData = await searchByName.json();
            console.log(nameData);
            setTourist(nameData);
    };
    async function placeChangeHandler (event) {
        const searchByPlace = await fetch(
            `http://localhost/yii/travel-registration/frontend/web/index.php/tourists?filter[place][like]=${event.target.value}`
            );
            const placeData = await searchByPlace.json();
            setTourist(placeData);
    };
    async function emailChangeHandler (event) {
        const searchByEmail = await fetch(
            `http://localhost/yii/travel-registration/frontend/web/index.php/tourists?filter[email_id][like]=${event.target.value}`
            );
            const emailData = await searchByEmail.json();
            setTourist(emailData);
    };
    async function phoneChangeHandler (event) {
        const searchByphone = await fetch(
            `http://localhost/yii/travel-registration/frontend/web/index.php/tourists?filter[phone_no][like]=${event.target.value}`
            );
            const phoneData = await searchByphone.json();
            setTourist(phoneData); 
    };
    
    
    useEffect(() => {
        async function fetchTouristHandler(){
            // try{
              const response = await fetch('http://localhost/yii/travel-registration/frontend/web/index.php/tourists');

              // if(!response.ok){
              //   throw new Error('Something went wrong!');
              // }
        
              const dataDemo = await response.json();
              const total = dataDemo.length;
              const res = await fetch(`http://localhost/yii/travel-registration/frontend/web/index.php/tourists?per-page=${limit}&page=1`);
              const data = await res.json();
              setTourist(data);
              setPageCount(Math.ceil(total/limit));
             
            // }
            // catch (error) {
            //   console.log(error.message);
            // } 

          }
          fetchTouristHandler();
        },[limit]);

        async function fetchPageHandler(currentPage){
          // console.log(currentPage);
          const response = await fetch(`http://localhost/yii/travel-registration/frontend/web/index.php/tourists?per-page${limit}&page=${currentPage}`);
          const data = await response.json();
          return data;

        };

        async function pageClickHandler(data){
          let currentPage = data.selected + 1;
          const dataFromServer = await fetchPageHandler(currentPage);
          setTourist(dataFromServer);
        };

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
            <>
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
                  <tr>
                    <td>
                    <input type="text" onChange={idChangeHandler} id='id'/>
                    </td>
                    <td>
                      <input type="text" onChange={nameChangeHandler} id='name'/>
                    </td>
                    <td>
                      <input type="text" onChange={placeChangeHandler} id='place'/>
                    </td>
                    <td>
                      <input type="text" onChange={emailChangeHandler} id='email_id'/>
                    </td>
                    <td>
                      <input type="text" onChange={phoneChangeHandler} id='phone_no'/>
                    </td>
                      <td>
                          <select onChange={settingTourist}>
                            <option>Sort by Select</option>
                            <option value='name'>Tourist Name</option>
                            <option value='-name'>Descending Tourist Name</option>
                            <option value='place'>Tourist Place</option>
                            <option value='-place'>Descending Tourist Place</option>
                            <option value='email_id'>Tourist Email-Id</option>
                            <option value='phone_no'>Tourist Phone No</option>
                          </select>
                      </td>
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

                <ReactPaginate
                previousLabel={"previous"}
                nextLabel={"next"}
                breakLabel={"..."}
                pageCount={pageCount}
                marginPagesDisplayed={4}
                onPageChange={pageClickHandler}
                containerClassName={"pagination justify-content-center"}
                pageClassName={"page-item"}
                pageLinkClassName={"page-link"}
                previousClassName={"page-item"}
                previousLinkClassName={"page-link"}
                nextClassName={"page-item"}
                nextLinkClassName={"page-link"}
                breakClassName={"page-item"}
                breakLinkClassName={"page-link"}
                activeClassName={"active"}
            />
</>
               
                );
        
};

export default Tourist;