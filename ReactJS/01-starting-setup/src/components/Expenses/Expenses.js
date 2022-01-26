
import './Expenses.css';
import Card from '../UI/Card';
import React, {useState} from 'react';
import ExpensesFilter from './ExpensesFilter.js';
import ExpensesList from './ExpensesList.js';
import ExpensesChart from './ExpensesChart';

const Expenses = (props) =>{
  const [filteredYear,setFilteredYear] = useState('2022');

  const filterChangeHandler = enteredYear =>{
  console.log('Expenses.js');
  setFilteredYear(enteredYear);
};

const filteredExpenses = props.items.filter(expense =>{
  return expense.date.getFullYear().toString() === filteredYear;
});

  
    return (
      <div>
        <Card className='expenses'>
      <ExpensesFilter 
      selected={filteredYear} 
      onChangeFilter ={filterChangeHandler}
      />
      <ExpensesChart expenses={filteredExpenses}/>
          <ExpensesList items={filteredExpenses}/>
        </Card>
        </div>
      );
};
export default Expenses;