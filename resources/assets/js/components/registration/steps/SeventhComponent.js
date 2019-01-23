import React, { Component } from "react";
import Cropper from "react-cropper";
import "cropperjs/dist/cropper.css";

class SeventhComponent extends Component {
    constructor(props) {
        super(props);

        let baseUrl = window.location.origin;
        let cropped_url = this.props.coverPhoto.indexOf("data") === 0 ? this.props.coverPhoto : baseUrl + this.props.coverPhoto;

        this.state = {
            src: null,
            croppedImageUrl: cropped_url
        };

        this.onChange = this.onChange.bind(this);
        this.crop = this.crop.bind(this);
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
        this.props.handlerCoverPhoto(cropped_url);
    }

    render() {
        const { croppedImageUrl, src } = this.state;
        console.log(src);
        return (
            <React.Fragment>
                <h1>Cover photo</h1>
                <div className="cover-upload">
                    <input type="file" onChange={this.onChange} />
                    <Cropper
                        ref="cropper"
                        src={src}
                        style={{ height: "400", width: "100%" }}
                        // Cropper.js options
                        aspectRatio={16 / 9}
                        guides={false}
                        crop={this.crop}
                    />
                    <div className="cover-preview">
                        <img src={croppedImageUrl} alt=""/>
                    </div>
                </div>
            </React.Fragment>
        );
    }
}

export default SeventhComponent;
