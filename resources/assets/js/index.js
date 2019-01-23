import React,{Component} from "react";
import App from "./Main";
import LoginForm from "./components/Auth/LoginForm";
import RegisterForm from "./components/Auth/RegisterForm";
import ReactDOM from "react-dom";

import { createStore } from 'redux';
import { Provider } from 'react-redux';
import rootReducer from './Reducers/Reducers';

const store = createStore(rootReducer);

if (document.getElementById('root')) {
  ReactDOM.render(<Provider store={store}><App/></Provider>, document.getElementById('root'));
}

if (document.getElementById('login-form')) {
  ReactDOM.render(<Provider store={store}><LoginForm/></Provider>, document.getElementById('login-form'));
}

if (document.getElementById('register-form')) {
  ReactDOM.render(<Provider store={store}><RegisterForm/></Provider>, document.getElementById('register-form'));
}