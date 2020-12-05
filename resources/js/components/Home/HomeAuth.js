import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class HomeAuth extends Component {
    render(){
        return (
    <div className="row justify-content-center mt-3">
        <div className="col-md-12 card">
            <div className="card-body alignText">
                <h4 className="card-title">Access the To-Do list</h4>
                <div className="row mt-3">
                    <div className="btnAuth col-md-12">
                        <a href="/task" className="btn btnHome btn-primary">To-Do List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
        )}
}

if (document.getElementById('homeAuth')){
    ReactDOM.render(<HomeAuth/>, document.getElementById('homeAuth'));
}