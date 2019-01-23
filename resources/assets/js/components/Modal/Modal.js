import React, { Component } from 'react';
import LoginForm from '../Auth/LoginForm';
import { connect } from 'react-redux';
import './Modal.scss';


class Modal extends Component {
  render() { 
    let isAuth = this.props.Auth;
    console.log("Auth from redux: ", isAuth);
    return ( 
      <React.Fragment>
        { 
          !isAuth ?
          <div className="login_modal">
            <div className="login-form"><LoginForm /></div>
          </div> : "" 
        }
      </React.Fragment>
    );
  }
}

function mapStateToProps(state) {
  return state;
}
 
export default connect(mapStateToProps, null)(Modal);
