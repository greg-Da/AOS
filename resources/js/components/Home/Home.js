import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Home extends Component {
    render(){
        return (
                <div className="row justify-content-center">
                    <div className="col-md-8 alignText">
                        <h2>Welcome to the To Do List</h2>
                    </div>
                </div>
        );
    }
}

if (document.getElementById('home')){
    ReactDOM.render(<Home/>, document.getElementById('home'));
}