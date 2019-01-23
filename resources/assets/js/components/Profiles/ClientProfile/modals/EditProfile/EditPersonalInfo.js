import React, { Component } from "react";
import { auth } from "../../../../../helpers";
 
import "./edit-profile.scss";

class EditPersonalInfo extends Component {
    constructor(props) {
        super(props);

        let { user } = this.props;

        this.state = {
          country: user.country,
          city: user.city,
          languages: user.language,
          relationship: user.relationship,
          kids: user.children,
          height: user.height,
          eyes: user.eye_color,
          hair: user.hair_color,
        };

        this.handleSubmit = this.handleSubmit.bind(this);
        this.handleChangeCountry = this.handleChangeCountry.bind(this);
        this.handleChangeCity = this.handleChangeCity.bind(this);
        this.handleChangeLanguages = this.handleChangeLanguages.bind(this);
        this.handleChangeRelationship = this.handleChangeRelationship.bind(this);
        this.handleChangeKids = this.handleChangeKids.bind(this);
        this.handleChangeHeight = this.handleChangeHeight.bind(this);
        this.handleChangeEyes = this.handleChangeEyes.bind(this);
        this.handleChangeHair = this.handleChangeHair.bind(this);
    }

    handleSubmit() {
        console.log("Submit");
        let data = {
          country: this.state.county,
          city: this.state.city,
          language: this.state.languages,
          relationship: this.state.relationship,
          children: this.state.kids,
          height: this.state.height,
          eye_color: this.state.eyes,
          hair_color: this.state.hair
        }
        console.log("Data for Submit: ", data);

        auth.post('client/update', data).then(res => {
            console.log("Update Basic Info success: ", res.data);
        }).catch(error => {
            console.log("Update Basic Info error: ", error.response);
        });
    }

    handleChangeCountry(event) {
        console.log(event.target.value);
        this.setState({
            county: event.target.value
        })
    }

    handleChangeCity(event) {
        console.log(event.target.value);
        this.setState({
            city: event.target.value
        })
    }

    handleChangeLanguages(event) {
        console.log(event.target.value);
        this.setState({
            languages: event.target.value
        })
    }

    handleChangeRelationship(event) {
        console.log(event.target.value);
        this.setState({
            relationship: event.target.value
        })
    }

    handleChangeKids(event) {
        console.log(event.target.value);
        this.setState({
            kids: event.target.value
        })
    }

    handleChangeHeight(event) {
        console.log(event.target.value);
        this.setState({
            height: event.target.value
        })
    }

    handleChangeEyes(event) {
        console.log(event.target.value);
        this.setState({
            eyes: event.target.value
        })
    }

    handleChangeHair(event) {
        console.log(event.target.value);
        this.setState({
            hair: event.target.value
        })
    }

    render() {
        let { user } = this.props;
        console.log("User: ", user);
        return (
            <React.Fragment>
                <div
                    className="modal fade"
                    tabIndex="-1"
                    role="dialog"
                    id="editPersonalInfo"
                >
                    <div className="modal-dialog" role="document">
                        <div className="modal-content">
                            <div className="modal-header">
                                <h5 className="modal-title">Update your personal information</h5>
                                <button
                                    type="button"
                                    className="close"
                                    data-dismiss="modal"
                                    aria-label="Close"
                                >
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div className="modal-body">
                              <div className="about-personal-info">
                                  <span>Country </span>
                                  <input
                                      type="text"
                                      onChange={this.handleChangeCountry}
                                      defaultValue={user.country}
                                  />
                              </div>
                              <div className="about-personal-info">
                                  <span>City </span>
                                  <input
                                      type="text"
                                      onChange={this.handleChangeCity}
                                      defaultValue={user.city}
                                  />
                              </div>
                              <div className="about-personal-info">
                                  <span>Languages </span>
                                  <input
                                      type="text"
                                      onChange={this.handleChangeLanguages}
                                      defaultValue={user.language}
                                  />
                              </div>

                              <div className="about-personal-info">
                                  <span>Relationship </span>
                                  <div>
                                      <div><input type="radio" name="relationship" value="In relationship" onChange={this.handleChangeRelationship} defaultChecked={user.relationship === "In relationship" ? true : false}/><span>In relationship</span></div>
                                      <div><input type="radio" name="relationship" value="In open relationship" onChange={this.handleChangeRelationship} defaultChecked={user.relationship === "In open relationship" ? true : false}/><span>In open relationship</span></div>
                                      <div><input type="radio" name="relationship" value="Single" onChange={this.handleChangeRelationship} defaultChecked={user.relationship === "Single" ? true : false}/><span>Single</span></div>
                                      <div><input type="radio" name="relationship" value="Engaged" onChange={this.handleChangeRelationship} defaultChecked={user.relationship === "Engaged" ? true : false}/><span>Engaged</span></div>
                                      <div><input type="radio" name="relationship" value="Married" onChange={this.handleChangeRelationship} defaultChecked={user.relationship === "Married" ? true : false}/><span>Married</span></div>
                                      <div><input type="radio" name="relationship" value="Divorced" onChange={this.handleChangeRelationship} defaultChecked={user.relationship === "Divorced" ? true : false}/><span>Divorced</span></div>
                                  </div>
                              </div>

                              <div className="about-personal-info">
                                  <span>Have kids </span>
                                  <input type="radio" name="kids" value="Yes" onChange={this.handleChangeKids} defaultChecked={user.children === "Yes" ? true : false} /><span>Yes</span>
                                  <input type="radio" name="kids" value="No" onChange={this.handleChangeKids} defaultChecked={user.children === "No" ? true : false} /><span>No</span>
                              </div>

                              <div className="about-personal-info">
                                  <span>Height </span>
                                  <input
                                      type="number"
                                      onChange={this.handleChangeHeight}
                                      defaultValue={user.height}
                                  />
                                  <span>cm</span>
                              </div>
                              <div className="about-personal-info">
                                  <span>Eyes </span>
                                  <input
                                      type="text"
                                      onChange={this.handleChangeEyes}
                                      defaultValue={user.eye_color}
                                  />
                              </div>
                              <div className="about-personal-info">
                                  <span>Hair </span>
                                  <input
                                      type="text"
                                      onChange={this.handleChangeHair}
                                      defaultValue={user.hair_color}
                                  />
                              </div>
                            </div>
                            <div className="modal-footer">
                                <button
                                    type="button"
                                    className="btn btn-primary"
                                    onClick={this.handleSubmit}
                                >
                                    Submit
                                    </button>
                                <button
                                    type="button"
                                    className="btn btn-secondary"
                                    data-dismiss="modal"
                                >
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </React.Fragment>
        );
    }
}

export default EditPersonalInfo;
