import React from 'react';
import ReactDOM from 'react-dom';

function Board() {
    return (
        <div className="container">
        <div className="row align-items-center vh-100">
            <div className="col-6 mx-auto">
                <div className="card shadow border">
                    <div className="card-body bg-primary d-flex flex-column align-items-center">
                        <h4 className="card-text text-center">Welcome To Trello Project Managment System</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    )
}

if (document.getElementById('board')) {
    ReactDOM.render(<Board />, document.getElementById('board'));
}

export default Board;
