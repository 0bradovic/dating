import React, { Component, PropTypes } from "react";
import moment from "moment";
import "react-datepicker/dist/react-datepicker.css";

class FirstComponent extends Component {
    constructor() {
        super();

        this.state = {
            startDate: moment(),
            county: "",
            city: "",
            languages: "",
            relationship: "",
            kids: "",
            height: "",
            eyes: "",
            hair: "",
        };

        this.handleNick = this.handleNick.bind(this);
        this.handleGender = this.handleGender.bind(this);
        this.yourGender = this.yourGender.bind(this);

    }

    handleNick(event) {
        this.props.changeNickName(event.target.value);
    }
    handleGender(gender) {
        event.preventDefault();
        this.props.changeSeekingGender(gender.target.getAttribute("value"));
    }
    yourGender(usergender) {
        this.props.changeYourGender(usergender.target.getAttribute("value"));
    }

    render() {
        console.log("All State: ", this.props.allState);
        return (
            <React.Fragment>
                <div className="nick">
                    <label>
                        Name or <br />
                        Nickname{" "}
                    </label>
                    <input
                        onChange={this.handleNick}
                        className="textbox"
                        type="text"
                        value={this.props.allState.nickName}
                    />
                </div>

                <div className="gender">
                    <div className="i-am">
                        <input
                            type="radio"
                            className="gender-radio"
                            id="radio-male-seek"
                            autoComplete="off"
                            name="user-gender-radio"
                            value="male"
                        />
                        <label
                            className="btn btn-success male"
                            onClick={this.yourGender}
                            htmlFor="radio-male-seek"
                            value="male"
                        />
                        <span className="glyphicon glyphicon-ok" />

                        <input
                            type="radio"
                            className="gender-radio"
                            id="radio-female-seek"
                            name="user-gender-radio"
                            autoComplete="off"
                            value="female"
                        />
                        <label
                            className="btn btn-success female"
                            onClick={this.yourGender}
                            htmlFor="radio-female-seek"
                            value="female"
                        />
                        <span className="glyphicon glyphicon-ok" />
                    </div>
                    <div className="seeking">
                        <input
                            type="checkbox"
                            className="gender-checkbox"
                            id="check-male-seek"
                            autoComplete="off"
                            value="male"
                        />
                        <label
                            className="btn btn-success male"
                            onClick={this.handleGender}
                            htmlFor="check-male-seek"
                            value="male"
                        />
                        <span className="glyphicon glyphicon-ok" />

                        <input
                            type="checkbox"
                            className="gender-checkbox"
                            id="check-female-seek"
                            autoComplete="off"
                            value="female"
                        />
                        <label
                            className="btn btn-success female"
                            onClick={this.handleGender}
                            htmlFor="check-female-seek"
                            value="female"
                        />
                        <span className="glyphicon glyphicon-ok" />
                    </div>

                    
                </div>

                <div>
                    <div className="about-personal-info">
                        <span>Country </span>
                        <input
                            type="text"
                            onChange={this.props.handleChangeCountry}
                            value={this.props.allState.county}
                        />
                    </div>
                    <div className="about-personal-info">
                        <span>City </span>
                        <input
                            type="text"
                            onChange={this.props.handleChangeCity}
                            value={this.props.allState.city}
                        />
                    </div>
                    <div className="about-personal-info">
                        <span>Languages </span>
                        <input
                            type="text"
                            onChange={this.props.handleChangeLanguages}
                            value={this.props.allState.languages}
                        />
                    </div>

                    <div className="about-personal-info">
                        <span>Relationship </span>
                        <div>
                            <div><input type="radio" name="relationship" value="In relationship" onChange={this.props.handleChangeRelationship} defaultChecked={this.props.allState.relationship === "In relationship" ? true : false}/><span>In relationship</span></div>
                            <div><input type="radio" name="relationship" value="In open relationship" onChange={this.props.handleChangeRelationship} defaultChecked={this.props.allState.relationship === "In open relationship" ? true : false}/><span>In open relationship</span></div>
                            <div><input type="radio" name="relationship" value="Single" onChange={this.props.handleChangeRelationship} defaultChecked={this.props.allState.relationship === "Single" ? true : false}/><span>Single</span></div>
                            <div><input type="radio" name="relationship" value="Engaged" onChange={this.props.handleChangeRelationship} defaultChecked={this.props.allState.relationship === "Engaged" ? true : false}/><span>Engaged</span></div>
                            <div><input type="radio" name="relationship" value="Married" onChange={this.props.handleChangeRelationship} defaultChecked={this.props.allState.relationship === "Married" ? true : false}/><span>Married</span></div>
                            <div><input type="radio" name="relationship" value="Divorced" onChange={this.props.handleChangeRelationship} defaultChecked={this.props.allState.relationship === "Divorced" ? true : false}/><span>Divorced</span></div>
                        </div>
                    </div>

                    <div className="about-personal-info">
                        <span>Have kids </span>
                        <input type="radio" name="kids" value="Yes" onChange={this.props.handleChangeKids} defaultChecked={this.props.allState.kids === "Yes" ? true : false} /><span>Yes</span>
                        <input type="radio" name="kids" value="No" onChange={this.props.handleChangeKids} defaultChecked={this.props.allState.kids === "No" ? true : false} /><span>No</span>
                    </div>

                    <div className="about-personal-info">
                        <span>Height </span>
                        <input
                            type="number"
                            onChange={this.props.handleChangeHeight}
                            value={this.props.allState.height}
                        />
                        <span>cm</span>
                    </div>
                    <div className="about-personal-info">
                        <span>Eyes </span>
                        <input
                            type="text"
                            onChange={this.props.handleChangeEyes}
                            value={this.props.allState.eyes}
                        />
                    </div>
                    <div className="about-personal-info">
                        <span>Hair </span>
                        <input
                            type="text"
                            onChange={this.props.handleChangeHair}
                            value={this.props.allState.hair}
                        />
                    </div>
                </div>
            </React.Fragment>
        );
    }
}

export default FirstComponent;
