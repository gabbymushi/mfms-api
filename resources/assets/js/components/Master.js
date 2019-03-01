import React,{Component} from 'react';
import {Switch,Route,Link} from 'react-router-dom';
//import {Router,Route, Switch } from 'react-router';
import CreateItem from "./CreateItem";
import DisplayItem from "./DisplayItem";
import EditItem from "./EditItem";

class Master extends Component{
render(){
    return(
        <div className="container">
            <nav className="navbar navbar-default">
                <div className="container-fluid">
                    <div className="navbar-header">
                        <a className="navbar-brand" href="#">AppDividend</a>
                    </div>
                    <ul className="nav navbar-nav">
                        <li><Link to="/">Home</Link></li>
                        <li><Link to="/add-items">Create Items</Link></li>
                        <li><Link to="/display-item">View Items</Link></li>
                    </ul>
                </div>

            </nav>
            <div>
                {/*{this.props.children}*/}

            </div>
            <Switch>
                {/*<Route exact path=""  component={Master}/>*/}
                <Route path="/add-items" component={CreateItem}/>
                <Route path="/display-item" component={DisplayItem} />
                <Route path="/edit/:id" component={EditItem} />
            </Switch>
        </div>

    )
}
}
export default Master;