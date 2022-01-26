import './ExpenseItem.css';
import ExpenseDate from './ExpenseDate';
import Card from '../UI/Card';
import React  from 'react';

/*{useState} This func allows us to define values as state 
where changes to these values should reflect in the 
component function being called again
*/
const ExpenseItem = (props) =>{

    return (
        <li>
    <Card className='expense-item'>
        <ExpenseDate date={props.date}/>
        
        <div className='expense-item__description'>
            <h2>{props.title}</h2>
            <div className='expense-item__price'>${props.amount}</div>
        </div>
    </Card>
    </li>
    );
}

export default ExpenseItem;