import { Route, Switch, Redirect } from "react-router-dom";

import './App.css';
import AddTourist from "./components/AddTourist";
import UpdateTourist from "./components/UpdateTourist";
import Tourist from "./components/Tourist";
import MainNavigation from "./components/MainNavigation";

function App(){

  return (
    <div>
      <MainNavigation/>
      <main>
        <Switch>
          <Route path= '/' exact>
            <Redirect to = '/tourist'/>
          </Route>
          <Route path='/tourist' exact>
          <Tourist />
        </Route>
        <Route path='/new-tourist' exact>
          <AddTourist />
        </Route>
        <Route path='/updatetourist/:touristId'>
          <UpdateTourist />
        </Route>
      </Switch>
      </main>
    </div>
  );
}

export default App;