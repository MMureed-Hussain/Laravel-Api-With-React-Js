import React from 'react'
import ReactDOM  from 'react-dom';
import {BrowserRouter, Routes,Route,Link} from 'react-router-dom';
import NavBar from './NavBar';
import Register from './Register';
import Login from './Login';
import Board from './Board';
import CreateList from './List/CreateList';


function Trello() {
  return (

    <div>

      <NavBar />
        <Routes>
            {/* <Route exact path="/" element={ <Trello/> } ></Route> */}
            <Route path="/register" element={<Register/>} />
            <Route path="/login" element={<Login/>} />
            <Route path="/board" element={<Board/>} />
            <Route path="/listts" element={<CreateList/>} />
            {/* <Route path="*" element={ <h1>Page Not Found</h1>} /> */}
        </Routes>
        {/* <p className="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Welcome</p> */}
    </div>
  )
}

// if (document.getElementById('trello')) {
//     ReactDOM.render(
//     <React.StrictMode>
//       <BrowserRouter>
//           <Trello />
//        </BrowserRouter>
//     </React.StrictMode>
//     , document.getElementById('trello'));
// }
const container = document.getElementById('trello');
if (container) {
    const root = ReactDOM.createRoot(container);
    root.render(
        <React.StrictMode>
            <BrowserRouter>
                <Trello/>
            </BrowserRouter>
        </React.StrictMode>
    );
}

export default  Trello;