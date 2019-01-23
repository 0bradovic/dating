import React, { Component } from "react";
import "./shopping.scss";

class Shopping extends Component {
    constructor(props) {
        super(props);
        this.state = {
            count: this.props.value,
            images: "https://tinyurl.com/y87m4n3u",
            items: ["item", "item", "item2", "item3", "item4", "item5"]
        };
        this.addItem = this.addItem.bind(this);
        this.removeItem = this.removeItem.bind(this);
        // this.onDelete = this.onDelete.bind(this);
        this.deleteItem = this.deleteItem.bind(this);
        // this.countReset = this.countReset.bind(this);
    }
    formatCount() {
        let { count } = this.state;
        return count === 0 ? "None" : count;
    }
    getBadgeClasses() {
        let classes = "badge m-2 badge-";
        classes += this.state.count === 0 ? "warning" : "primary";
        return classes;
    }
    removeItem() {
        this.setState({
            count: this.state.count - 1
        });
    }
    addItem(item) {
        console.log(item);

        this.setState({
            count: this.state.count + 1
        });
    }
    deleteItem() {
        this.setState({
            count: 0
        });
    }
    // countReset(){
    //     console.log(this.state.items[1])
    //     this.setState({
    //         count: this.state.count === 0
    //     })
    // }
    render() {
        console.log("props", this.props);
        return (
            <div className="shopping-item">
                <img src={this.state.images} alt="" />
                <h3>Flower {this.props.item}</h3>
                <span className={this.getBadgeClasses()}>
                    {this.formatCount()}
                </span>
                <div className="add-remove-buttons">
                    <button onClick={this.addItem} className="btn btn-info">
                        {" "}
                        {/* pass the argument*/}
                        Add
                    </button>
                    <button
                        className="btn btn-danger btn-sm m-2"
                        onClick={this.removeItem}
                    >
                        -{" "}
                    </button>
                    <button
                        onClick={this.deleteItem}
                        className="btn btn-danger btn-sm m-2"
                    >
                        delete
                    </button>
                </div>
            </div>
        );
    }
}

export default Shopping;
