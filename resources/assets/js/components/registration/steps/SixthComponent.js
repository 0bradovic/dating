import React from "react";
import Cropper from "react-cropper";
import "cropperjs/dist/cropper.css";
import Avatar from "react-avatar-edit"; // for profile photo

class SixthComponent extends React.Component {
    constructor(props) {
        super(props);
        // const src = './example/einshtein.jpg'

        let baseUrl = window.location.origin;
        let cropped_url = this.props.profilePhoto.indexOf("data") === 0 ? this.props.profilePhoto : baseUrl + this.props.profilePhoto;

        this.state = {
            src: null,
            croppedImageUrl: cropped_url,
            cover: null,
            cover_croppred: null
        };
        this.onCrop = this.onCrop.bind(this);
        this.onClose = this.onClose.bind(this);
        this.profileUpload = this.profileUpload.bind(this);
        // this.photoUploadHandler = this.photoUploadHandler.bind(this);
        this.onChange = this.onChange.bind(this);
        this.crop = this.crop.bind(this);
        
    }
    profileUpload(profile) {
        console.log(profile.target.value);
        this.props.hangeAvatar(profile.target.value);
      }

    onClose() {
        this.setState({ croppedImageUrl: null });
    }

    onCrop(croppedImageUrl) {
        this.setState({ croppedImageUrl });
        console.log(croppedImageUrl);
        this.props.handlerProfilePhoto(croppedImageUrl);


    }

    onChange(event) {
        let file = event.target.files[0];
        console.log("Img: ", file);

        const reader = new FileReader();
        reader.onload = () => {
            this.setState({ src: reader.result });
        };
        reader.readAsDataURL(file);
        console.log("Img src: ", this.state.src);
    }

    crop() {
        // image in dataUrl
        let cropped_url = this.refs.cropper.getCroppedCanvas().toDataURL();
        this.setState({
            croppedImageUrl: cropped_url
        })
        console.log(this.state.croppedImageUrl);
        this.props.handlerProfilePhoto(cropped_url);
    }
    
    render() {
        return (
            <React.Fragment>
                <h1>Profile photo</h1>
                <div className="avatar-upload">
                    {/* <Avatar
                        width={300}
                        height={300}
                        //imageWidth={300}
                        borderStyle={"2px double rgb(151, 151, 151)"}
                        onCrop={this.onCrop}
                        onClose={this.onClose}
                        src={this.state.src}
                        cropRadius={50}
                        minCropRadius={30}
                    /> */}

                    <input type="file" onChange={this.onChange} />

                    <Cropper
                        ref="cropper"
                        src={this.state.src}
                        style={{ height: "400px", width: "100%" }}
                        // Cropper.js options
                        aspectRatio={1 / 1}
                        guides={false}
                        crop={this.crop}
                        minCropBoxWidth={150}
                        minCropBoxHeight={150}
                    />

                    <div className="profile-photo-preview">
                        <img src={this.state.croppedImageUrl} alt="" />
                    </div>
                    
                </div>
            </React.Fragment>
            
           
        );
    }
}
export default SixthComponent;
