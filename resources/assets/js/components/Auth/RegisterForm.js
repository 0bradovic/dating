import React, { Component } from 'react';
import { API_URL } from '../../helpers';
import { YearPicker, MonthPicker, DayPicker } from 'react-dropdown-date';
import { connect } from 'react-redux';
import { setAuth } from '../../Actions/Actions';
import './auth.scss';

class RegisterForm extends Component {
  constructor(props) {
    super(props);

    this.state = { 
      year: "", 
      month: "",
      day: "",
      gender: "male",
      username: "",
      email: "",
      password: "",
      password_confirmation: ""
    };

    this.formatDate = this.formatDate.bind(this);
    this.handleChangeDay = this.handleChangeDay.bind(this);
    this.handleChangeMonth = this.handleChangeMonth.bind(this);
    this.handleChangeYear = this.handleChangeYear.bind(this);
    this.handleChangeGender = this.handleChangeGender.bind(this);
    this.handleChangeUsername = this.handleChangeUsername.bind(this);
    this.handleChangeEmail = this.handleChangeEmail.bind(this);
    this.handleChangePassword = this.handleChangePassword.bind(this);
    this.handleChangeConfirmPassword = this.handleChangeConfirmPassword.bind(this);
    this.handleSubmitRegister = this.handleSubmitRegister.bind(this);
  }

  componentDidUpdate() {
    let day = this.formatDate();
    console.log("Date: ", day);
  }

  handleChangeDay(day) {
    //console.log(day);
    this.setState({ day });
  }

  handleChangeMonth(month) {
    //console.log(month);
    //this.setState({ month: parseInt(month) + 1 });
    this.setState({ month });
  }

  handleChangeYear(year) {
    //console.log(year);
    this.setState({ year });
  }

  formatDate() {
    let { day, month, year } = this.state;

    let month_inc = parseInt(month) + 1;

    if (month< 10) month = '0' + month_inc;
    if (day.length < 2) day = '0' + day;

    let date = [year, month, day].join('-');
    //console.log("Date: ", date);
    return date;
  }

  handleChangeGender(event) {
    let gender = event.target.value;
    this.setState({ gender });
    console.log(gender);
  }

  handleChangeUsername(event) {
    let username = event.target.value;
    this.setState({ username });
    console.log(username);
  }

  handleChangeEmail(event) {
    let email = event.target.value;
    this.setState({ email });
    console.log(email);
  }

  handleChangePassword(event) {
    let password = event.target.value;
    this.setState({ password });
    console.log(password);
  }

  handleChangeConfirmPassword(event) {
    let password_confirmation = event.target.value;
    this.setState({ password_confirmation });
    console.log(password_confirmation);
  }

  handleSubmitRegister() {
    let { gender, username, email, password, password_confirmation } = this.state;
    let date_of_birth = this.formatDate();

    let url = API_URL + "client/register";

    let data = {
      date_of_birth,
      gender,
      username,
      email,
      password,
      password_confirmation
    }

    console.log("Data: ", data);

    if ( password === password_confirmation ) {
      axios({
        method: 'post',
        url: url,
        headers: { 'Content-Type': 'application/json' },
        data: data
      }).then(res => {
          console.log("Register response: ", res.data);
          localStorage.setItem("auth_token", res.data.auth_token);
          localStorage.setItem("from_register", true);
          this.props.setAuth(true);
          window.location.href = '/dashboard';
      });
    } else {
        alert("Password confirm error");
    }
  }
  
  render() { 
    return ( 
      <React.Fragment>
        <div className="register-title">Create a new account</div>
        <a className="social-register face" href="#">Sign up with facebook</a>
        <a className="social-register google" href="#">Sign up with Google</a>

        <div className="register-separator">
          <div className="separator-icon"></div>
        </div>

        <div>
          <div className="birthday">
            <div className="birthday-label">Birthday</div>
            <div className="birthday-date">
              {/* <input type="text" name="month" className="month" placeholder="Aug"/>
              <input type="text" name="date" className="date" placeholder="21"/>
              <input type="text" name="year" className="year" placeholder="1993"/> */}
              
                <MonthPicker
                  defaultValue="Month"
                  // to get months as numbers
                  //numeric
                  // default is full name
                  short
                  // default is Titlecase
                  //caps
                  // mandatory if end={} is given in YearPicker
                  endYearGiven
                  // mandatory
                  year={this.state.year}
                  // default is false
                  required={true}
                  // default is false
                  disabled={false}
                  // mandatory
                  //value={this.state.month}
                  // mandatory
                  onChange={this.handleChangeMonth}
                  id={'month'}
                  name={'month'}
                  classes={'month'}
                />
                <DayPicker
                  defaultValue="Day"
                  // mandatory
                  year={this.state.year}
                  // mandatory
                  month={this.state.month}
                  // mandatory if end={} is given in YearPicker
                  endYearGiven
                  // default is false
                  required={true}
                  // default is false
                  disabled={false}
                  // mandatory
                  value={this.state.day}
                  // mandatory
                  onChange={this.handleChangeDay}
                  id={'day'}
                  name={'day'}
                  classes={'day'}
                />
                <YearPicker
                  defaultValue="Year"
                  // default is 1900
                  start={1960}
                  // default is current year
                  //end={2020}
                  // default is ASCENDING
                  reverse
                  // default is false
                  required={true}
                  // default is false
                  disabled={false}
                  // mandatory
                  value={this.state.year}
                  // mandatory
                  onChange={this.handleChangeYear}
                  id={'year'}
                  name={'year'}
                  classes={'year'}
                />
            </div>
          </div>

          <div className="gender">
            <div className="gender-radio gender-male checked">
              <input type="radio" name="gender" className="male" value="male" onChange={this.handleChangeGender} defaultChecked/><span>Male</span>
            </div>
            <div className="gender-radio gender-female">
              <input type="radio" name="gender" className="female" value="female" onChange={this.handleChangeGender}/><span>Female</span>
            </div>
          </div>
          <input type="text" name="username" className="account-details" onChange={this.handleChangeUsername} placeholder="Username"/>
          <input type="email" name="email" className="account-details" onChange={this.handleChangeEmail} placeholder="E-mail"/>
          <input type="password" name="password" className="account-details" onChange={this.handleChangePassword} placeholder="Password"/>
          <input type="password" name="password_confirmation" className="account-details" onChange={this.handleChangeConfirmPassword} placeholder="Repeat password"/>
          <input type="button" className="register-submit" value="Register" onClick={this.handleSubmitRegister} />
        </div>
      </React.Fragment>
    );
  }
}
 
export default connect(null, { setAuth })(RegisterForm);