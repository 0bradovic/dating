import React, { Component } from 'react';
import { API_URL } from '../../helpers';
import ReactDOM from "react-dom";
import { connect } from 'react-redux';
import { setAuth } from '../../Actions/Actions';
import { auth } from "../../helpers";
import axios from "axios";

class LoginForm extends Component {
  constructor(props) {
    super(props);

    this.state = {
      email: "",
      password: "",
      error_message: ""
    }

    this.handleLoginSubmit = this.handleLoginSubmit.bind(this);
    this.handleEmail = this.handleEmail.bind(this);
    this.handlePassword = this.handlePassword.bind(this);
  }

  handleLoginSubmit() {
    let { email, password } = this.state;
    let url = API_URL + "client/login";

    let data = {
      email,
      password
    }

    axios({
      method: 'post',
      url: url,
      headers: { 'Content-Type': 'application/json' },
      data: data
    }).then(res => {
      console.log("Login response: ", res.data);
      if (res.data.status) {
        localStorage.setItem("auth_token", res.data.auth_token);
        //localStorage.setItem("user", )
        //this.props.setAuth(true);
        let auth_token = localStorage.getItem("auth_token");
        console.log("Auth token from localStorage: ", auth_token);

        axios({
          url: API_URL + 'client/object',
          headers: { 
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + res.data.auth_token
          },
        }).then(res => {
          console.log("User response: ", res.data);
          localStorage.setItem("user_id", res.data.id);
          this.props.setAuth(true);

          window.location.href = '/dashboard';
        });

        
      } else {
        console.log("Login failed");
        this.setState({
          error_message: "Wrong username or password"
        })
      }
    });

  }

  handleEmail(event) {
    let email = event.target.value;
    this.setState({
      email
    });
  }

  handlePassword(event) {
    let password = event.target.value;
    this.setState({
      password
    });
  }
  
  render() { 
    return (     
      
        <React.Fragment>
          <div className="form-group">
              <div className="error-block alert-warning">{this.state.error_message}</div>
          </div>
          <div className="form-group">
              <input id="email" type="text" className="form-control" name="email" placeholder="Email" onChange={this.handleEmail} required autoFocus />  
          </div>

          <div className="form-group">
              <input id="password" type="password" className="form-control" name="password" placeholder="Password" onChange={this.handlePassword} required />
          </div>
          <button className="btn btn-primary" onClick={this.handleLoginSubmit}>
              Login
          </button>
        </React.Fragment>
      
    );
  }
}
 
export default connect(null, { setAuth })(LoginForm);
