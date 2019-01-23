import React, { Component } from "react";
import "./dialog.scss";
import axios from 'axios';
import { connect } from "react-redux";
import ProgressBar from "./progressbar";
import FirstComponent from "./steps/FirstComponent";
import SecondComponent from "./steps/SecondComponent";
import ThirdComponent from "./steps/ThirdComponent";
import FourthComponent from "./steps/FourthComponent";
import FifthComponent from "./steps/FifthComponent";
import SixthComponent from "./steps/SixthComponent";
import SeventhComponent from "./steps/SeventhComponent";
import EightComponent from "./steps/EightComponent";
import { API_URL, auth } from "../../helpers";

class DialogModel extends Component {
    constructor(props) {
        super(props);

        let { user } = this.props;
        //console.log("User in Dialog constructor: ", this.props.user);

        let coverPhoto = user.cover_photo !== null && user.cover_photo !== undefined ? user.cover_photo.url : "";
        let profilePhoto = user.profile_photo !== null && user.profile_photo !== undefined ? user.profile_photo.url : "";
        let hairs = user.client_preferance !== null && user.client_preferance !== undefined ? user.client_preferance.hair : [];
        let minYear = user.client_preferance !== null && user.client_preferance !== undefined ? user.client_preferance.minYear : "";
        let maxYear = user.client_preferance !== null && user.client_preferance !== undefined ? user.client_preferance.maxYear : "";
        let interests = user.interests !== null && user.interests !== undefined ? user.interests : [];
        let looking_for = user.looking_for !== null && user.looking_for !== undefined ? [user.looking_for] : [];

        this.state = {
            skip_status: [false, false, false, false, false, false, false, false],
            currentStep: 1,
            steps: 8,
            percent: 0,
            // nickName: "",
            // userDetails: "", // heading
            // idealPartner: "", //to je about kljuc
            // interests: [],
            // hairs: [],
            // SeekingGender:[], //nema na back postoji ali vraca samo jedno
            // userGender:"",
            // YearsMinimum:"", //nema na back
            // YearsMaximum:"", //nema na back
            // profilePhoto: profilePhoto,
            // coverPhoto: coverPhoto,
            // country: "",
            // city: "",
            // languages: "",
            // relationship: "",
            // kids: "",
            // height: "",
            // eyes: "",
            // hair: "",
            nickName: user.nickName,
            userDetails: user.heading, // heading
            idealPartner: user.about, //to je about kljuc
            interests: interests,
            hairs: hairs,
            SeekingGender: looking_for, //nema na back postoji ali vraca samo jedno
            userGender: user.gender,
            YearsMinimum: minYear, //nema na back
            YearsMaximum: maxYear, //nema na back
            profilePhoto: "",
            coverPhoto: "",
            country: user.country,
            city: user.city,
            languages: user.language,
            relationship: user.relationship,
            kids: user.children,
            height: user.height,
            eyes: user.eye_color,
            hair: user.hair_color,
            allInterests: [], // sva interesovanja u bazi, nezavisno od klijenta
            allHairs: [], // sva boje kosa u bazi, nezavisno od klijenta
        };


        this.switchComponents = this.switchComponents.bind(this);
        this.changeState = this.changeState.bind(this);
        this.backState = this.backState.bind(this);
        this.skipState = this.skipState.bind(this);
        this.changeNickName = this.changeNickName.bind(this);
        this.changeHandler = this.changeHandler.bind(this);
        this.changeDetails = this.changeDetails.bind(this);
        this.changeIdeal = this.changeIdeal.bind(this);
        this.changeInterests = this.changeInterests.bind(this);
        this.changeAvatar = this.changeAvatar.bind(this);
        this.changeHair = this.changeHair.bind(this);
        this.changeSeekingGender = this.changeSeekingGender.bind(this);
        this.changeYourGender = this.changeYourGender.bind(this);
        this.handlerSubmit = this.handlerSubmit.bind(this);
        this.handlerProfilePhoto = this.handlerProfilePhoto.bind(this);
        this.handlerCoverPhoto = this.handlerCoverPhoto.bind(this);
        this.getAllInterests = this.getAllInterests.bind(this);
        this.getAllHairs = this.getAllHairs.bind(this);

        this.handleChangeCountry = this.handleChangeCountry.bind(this);
        this.handleChangeCity = this.handleChangeCity.bind(this);
        this.handleChangeLanguages = this.handleChangeLanguages.bind(this);
        this.handleChangeRelationship = this.handleChangeRelationship.bind(this);
        this.handleChangeKids = this.handleChangeKids.bind(this);
        this.handleChangeHeight = this.handleChangeHeight.bind(this);
        this.handleChangeEyes = this.handleChangeEyes.bind(this);
        this.handleChangeHair = this.handleChangeHair.bind(this);

        this.getAllInterests();
        this.getAllHairs();
    }

    componentWillMount() {
        //console.log("User in Dialog componentWillMount: ", this.props.user);
    }

    getAllInterests() {
        auth.get('client/interests/all').then(res => {
            console.log("All interests response: ", res.data);
            this.setState({
                allInterests: res.data
            })
            console.log("All Interests state: ", this.state.allInterests);
        }).catch(error => {
            console.log("All interests error response: ", error.response);
        })
    }

    getAllHairs() {
        auth.get('client/hairs/all').then(res => {
            console.log("All Hairs response: ", res.data);
            this.setState({
                allHairs: res.data
            })
            console.log("All Hairs state: ", this.state.allHairs);
        }).catch(error => {
            console.log("All Hairs error response: ", error.response);
        })
    }

    handlerSubmit() {
        console.log("Submit multistep");
        let url = API_URL + "client/update";
        let auth_token = localStorage.getItem("auth_token");

        let data = {
            id: this.props.user.id,
            nickname: this.state.nickName,
            heading: this.state.userDetails,
            about: this.state.idealPartner,
            clientInterests: this.state.interests,
            hair: this.state.hairs,
            looking_for: this.state.SeekingGender[0],
            gender: this.state.userGender,
            minYear: this.state.YearsMinimum,
            maxYear: this.state.YearsMaximum,
            profile_photo: this.state.profilePhoto,
            cover_photo: this.state.coverPhoto,
            country: this.state.county,
            city: this.state.city,
            language: this.state.languages,
            relationship: this.state.relationship,
            children: this.state.kids,
            height: this.state.height,
            eye_color: this.state.eyes,
            hair_color: this.state.hair,
        }

        console.log("Client data: ", data);

        auth.post('client/update', data).then(res => {
            console.log("Create profile response: ", res.data);
        }).catch(error => {
            console.log("Create profile error response: ", error.response);
        });
        
        //console.log('profile photo', this.state.profilePhoto);
        //console.log('client_id', this.props.user.id);


        // let profilePhotoData = {
        //     photo:  this.state.profilePhoto,
        //     client_id: this.props.user.id
        // }

        // // profile_photo, cover_photo

        // // console.log('profile photo', this.state.profilePhoto);
        // console.log('profilePhotoData', profilePhotoData);

        // axios.post('client/photos', profilePhotoData, {
        //     headers: { 
        //         //'Content-Type': 'multipart/form-data',
        //         'Authorization': 'Bearer ' + auth_token
        //     },
        // }).then(res => {
        //     console.log("Upload photo response: ", res);
        // }).catch(error => {
        //     console.log("Upload photo error response: ", error.response);
        // });
    }

    handlerProfilePhoto(photo) {
        console.log("Profile photo: ", photo);
        this.setState({
            profilePhoto: photo
        })
    }

    handlerCoverPhoto(photo) {
        console.log("Cover photo: ", photo);
        this.setState({
            coverPhoto: photo
        })
    }

    componentDidUpdate() {
        // console.log("Interests: ", this.state.interests);
        // console.log("hairs: ", this.state.hairs);
        // console.log("SeekingGender: ", this.state.SeekingGender);
        // console.log("userGender: ", this.state.userGender);
        // console.log(this.state);
        // console.log("YearsMaximum: ",this.state.YearsMaximum);
        // console.log("YearsMinimum: ",this.state.YearsMinimum);
        
    }

    changeNickName(name) {
        this.setState({
            nickName: name
        });
    }
    changeYourGender(gender){
        this.setState({
            userGender: gender
        });
    }

    changeSeekingGender(seeking) {
        let index = jQuery.inArray(seeking, this.state.SeekingGender);
        if (index !== -1) {
            //element je u nizu pa znaci da treba da ga izbacimo (ovo odgovara situaciji kad se checkbox odcekira)
            this.setState({
                SeekingGender: this.state.SeekingGender.filter(
                    (_, seeking) => seeking !== index
                ) //kod koji izbacuje element iz state niza
            });
        } else {
            //element nije u nizu pa treba da ga ubacimo (to se desava kad se checkbox cekira)
            this.setState({
                SeekingGender: this.state.SeekingGender.concat([seeking])
            });
        }
    }
    
    changeDetails(details) {
        this.setState({
            userDetails: details
        });
        console.log("Partner details: ", this.state.userDetails);
    }
    changeIdeal(ideal) {
        this.setState({
            idealPartner: ideal
        });
        console.log("Ideal Partner: ", this.state.idealPartner);
    }
    changeInterests(interest) {
        let index = jQuery.inArray(interest, this.state.interests);
        if (index !== -1) {
            //element je u nizu pa znaci da treba da ga izbacimo (ovo odgovara situaciji kad se checkbox odcekira)
            this.setState({
                interests: this.state.interests.filter(
                    (_, interest) => interest !== index
                ) //kod koji izbacuje element iz state niza
            });
        } else {
            //element nije u nizu pa treba da ga ubacimo (to se desava kad se checkbox cekira)
            this.setState({
                interests: this.state.interests.concat([interest])
            });
        }
    }
    
    changeHair(hair) {
        let index2 = jQuery.inArray(hair, this.state.hairs);
        if (index2 !== -1) {
           
            this.setState({
                hairs: this.state.hairs.filter(
                    (_, hair) => hair !== index2
                ) 
            });
        } else {
        
            this.setState({
                hairs: this.state.hairs.concat([hair])
            });
        }
    }
    changeHandler(values){
        
        this.setState({
            YearsMinimum: values[0],
            YearsMaximum: values[1]
        })
    }

    changeAvatar(avatar){
        this.setState({
            profilePhoto: avatar.target.files[0] 
        });
    }
    changeState() {
        let current_step = this.state.currentStep;
        let percent = this.state.percent;
        let skip_status = this.state.skip_status;

        if(current_step < 8){
            for(let i=0; i < skip_status.length; i++) {
                if( i === current_step - 1) {
                    skip_status[i] = false;
                }
            }

            this.setState({
                currentStep: ++this.state.currentStep,
                skip_status: skip_status,
            });

            //if (percent+15 <= 100) {
                this.setState({
                    percent: percent + 15
                })
            //}
        }
        
    }
    

    backState() {
        let current_step = this.state.currentStep;
        let percent = this.state.percent;
        if(current_step > 1){
            this.setState({
                currentStep: --this.state.currentStep,
            });
            if ( percent-15 >= 0 && !this.state.skip_status[current_step-2] ) {
                this.setState({
                    percent: percent - 15,
                });
                
            }
        }
        
        
    }
    skipState() {
        let current_step = this.state.currentStep;
        let skip_status = this.state.skip_status;

        if( current_step < 8 ) {
            for(let i=0; i < skip_status.length; i++) {
                if( i === current_step - 1) {
                    skip_status[i] = true;
                }
            }

            this.setState({
                currentStep: ++this.state.currentStep,
                skip_status: skip_status,
            });
        }

        console.log("Current step: ", current_step);
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

    switchComponents(component) {
        switch (component) {
            case 1:
                return (
                    <FirstComponent
                        changeNickName={this.changeNickName}
                        changeSeekingGender={this.changeSeekingGender}
                        changeYourGender={this.changeYourGender}
                        handleChangeCountry={this.handleChangeCountry}
                        handleChangeCity={this.handleChangeCity}
                        handleChangeLanguages={this.handleChangeLanguages}
                        handleChangeRelationship={this.handleChangeRelationship}
                        handleChangeKids={this.handleChangeKids}
                        handleChangeHeight={this.handleChangeHeight}
                        handleChangeEyes={this.handleChangeEyes}
                        handleChangeHair={this.handleChangeHair}
                        allState={this.state}
                    />
                );

            case 2:
                return <SecondComponent userDetails={this.state.userDetails} changeDetails={this.changeDetails} />;
            case 3:
                return <ThirdComponent idealPartner={this.state.idealPartner} changeIdeal={this.changeIdeal} />;

            case 4:
                return (
                    <FourthComponent clientInterests={this.state.interests} allInterests={this.state.allInterests} changeInterests={this.changeInterests} />
                );
            case 5:
                return <FifthComponent minYear={this.state.YearsMinimum} maxYear={this.state.YearsMaximum} changeHandler={this.changeHandler}/>;
            case 6:
                return <SixthComponent profilePhoto={this.state.profilePhoto} handlerProfilePhoto={this.handlerProfilePhoto} />;
            case 7:
                return <SeventhComponent coverPhoto={this.state.coverPhoto} handlerCoverPhoto={this.handlerCoverPhoto} />;  
            case 8:
                return <EightComponent clientHairs={this.state.hairs} allHairs={this.state.allHairs} changeHair={this.changeHair} />;
        }
    }

    render() {
        return (
            <div className="dialog-container-match">
                {this.switchComponents(this.state.currentStep)}
                <div className="step-buttons">
                    {this.state.currentStep > 1 ? (
                        <button
                            className="back-button"
                            onClick={this.backState}
                        >
                            Back
                        </button>
                    ) : (
                        <span className="back-span back-button" />
                    )}
                    <ProgressBar
                        percent={this.state.percent}
                        changeState={this.changeState}
                        handlerSubmit={this.handlerSubmit}
                        currentStep={this.state.currentStep}
                        steps={this.state.steps}
                    />
                    {
                        this.state.currentStep < this.state.steps ?
                            <button className="skip-button" onClick={this.skipState}>
                                Skip{" "}
                            </button> : <span className="back-span back-button" />
                    }
                    
                </div>
            </div>
        );
    }
}

function mapStateToProps(state) {
    return state;
  }

export default connect(mapStateToProps, null)(DialogModel);
