import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class HomeGuest extends Component {
    render(){
        return (
    <div className="row justify-content-center mt-3">
        <div className="col-md-12 card">
            <div className="card-body alignText">
                <h4 className="card-title">Please register or login</h4>
                <div className="row mt-3">
                    <div className="col-md-6">
                        <a href="/login" className="btn btnHome btn-primary">Login</a>
                    </div>
                    <div className="col-md-6">
                        <a href="/register" className="btn btnHome btn-info">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
        )}
}

if (document.getElementById('homeGuest')){
    ReactDOM.render(<HomeGuest/>, document.getElementById('homeGuest'));
}