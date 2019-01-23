import React, { Component } from "react";
import { auth } from "../../../../../helpers";
 
import "./edit-profile.scss";

class EditInterests extends Component {
  constructor(props) {
    super(props);

    let { user } = this.props;

    let interests = user.interests !== null && user.interests !== undefined ? user.interests : [];

    this.state = {
      clientInterests: interests
    };

    //this.interestsList = [];

    
    // this.interestsUpdate= this.interestsUpdate.bind(this);
    this.input = React.createRef();

    //let allInterests = this.props.allInterests;
    
    // allInterests.map(interest => {
    //     let label_classes = "btn btn-primary";
    //     let checked = false;
        
    //     for(let i = 0; i < this.state.clientInterests.length; i++) {
    //         if (interest.id == this.state.clientInterests[i]) {
    //             label_classes = "btn btn-primary active";
    //             checked = true;
    //             break;
    //         }
    //     }

    //     this.interestsList = [
    //         ...this.interestsList,
    //         <div
    //             className="checkbox-div"
    //             data-toggle="buttons"
    //             key={interest.id}
    //         >
    //             <label
    //                 className={label_classes}
    //                 value={interest.id}
    //                 onClick={this.handleChange}
    //             >
    //                 {interest.name}
    //             </label>
    //             <input
    //                 type="checkbox"
    //                 ref={this.input}
    //                 value={interest.id}
    //                 defaultChecked={checked}
    //             />
    //             <span className="glyphicon glyphicon-ok" />
    //         </div>
    //     ]
            
    // });

    this.handleChange = this.handleChange.bind(this);
  }

  handleChange(event) {
    let interest = event.target.getAttribute("value")
    let index = jQuery.inArray(interest, this.state.clientInterests);
    if (index !== -1) {
        //element je u nizu pa znaci da treba da ga izbacimo (ovo odgovara situaciji kad se checkbox odcekira)
        this.setState({
          clientInterests: this.state.clientInterests.filter(
                (_, interest) => interest !== index
            ) //kod koji izbacuje element iz state niza
        });
    } else {
        //element nije u nizu pa treba da ga ubacimo (to se desava kad se checkbox cekira)
        this.setState({
          clientInterests: this.state.clientInterests.concat([interest])
        });
    }
      
  }

  render() {

      let allInterests = this.props.allInterests;
      let interestsList = [];
      console.log("Interests list: ", this.state.clientInterests);

      allInterests.map(interest => {
          let label_classes = "btn btn-primary";
          let checked = false;
          
          for(let i = 0; i < this.state.clientInterests.length; i++) {
              if (interest.id == this.state.clientInterests[i]) {
                  label_classes = "btn btn-primary active";
                  checked = true;
                  break;
              }
          }

          interestsList = [
              ...interestsList,
              <div
                  className="checkbox-div"
                  data-toggle="buttons"
                  key={interest.id}
              >
                  <label
                      className={label_classes}
                      value={interest.id}
                      onClick={this.handleChange}
                  >
                      {interest.name}
                  </label>
                  <input
                      type="checkbox"
                      ref={this.input}
                      value={interest.id}
                      defaultChecked={checked}
                  />
                  <span className="glyphicon glyphicon-ok" />
              </div>
          ]
              
      });

      return (
          <React.Fragment>
            <div
                className="modal fade"
                tabIndex="-1"
                role="dialog"
                id="editInterests"
            >
                <div className="modal-dialog" role="document">
                    <div className="modal-content">
                        <div className="modal-header">
                            <h5 className="modal-title">Update Your Interest</h5>
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
                          <div className="edit-row">
                            <div className="interests-check">{interestsList}</div>
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

export default EditInterests;
