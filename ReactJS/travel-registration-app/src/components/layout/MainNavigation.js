import { NavLink } from "react-router-dom";
import classes from "./MainNavigation.module.css";
const MainNavigation = () => {
  return (
    <header className={classes.header}>
      <div className={classes.logo}>Tourist Details</div>
      <nav className={classes.nav}>
        <ul>
          <li>
            <NavLink to="/tourist" activeClassName={classes.active}>
             Tourists
            </NavLink>
          </li>
          <li>
            <NavLink to="/new-tourist" activeClassName={classes.active}>
              Add Tourist
            </NavLink>
          </li>
        </ul>
      </nav>
    </header>
  );
};
export default MainNavigation;