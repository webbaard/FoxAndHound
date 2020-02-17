import React, {Component} from 'react';
import Form from 'react-bootstrap/Form';
import Button from 'react-bootstrap/Button';
import PropTypes from "prop-types";

export default class AddMenuItemForm extends Component {

    constructor(props) {
        super(props);
        this.nameInput = React.createRef();
        this.priceInput= React.createRef();

        this.handleSubmit = this.handleSubmit.bind(this);
    }

    handleSubmit (event) {
        event.preventDefault();
        const { onNewMenuItemSubmit } = this.props;
        const nameInout = this.nameInput.current;
        const priceInput = this.priceInput.current;

        onNewMenuItemSubmit(
            nameInout.value,
            priceInput.value * 100
        );
    }

    render() {
        return (<div className="addMenuItem">
            <Form onSubmit={this.handleSubmit}>
                <Form.Group controlId="name">
                    <Form.Label>Name</Form.Label>
                    <Form.Control type="text" ref={this.nameInput} placeholder="Enter name"/>
                    <Form.Text className="text-muted">
                    </Form.Text>
                </Form.Group>
                <Form.Group controlId="price">
                    <Form.Label>Price</Form.Label>
                    <Form.Control type="text" ref={this.priceInput} placeholder="Enter price"/>
                    <Form.Text className="text-muted">
                    </Form.Text>
                </Form.Group>
                <Button type="submit">
                    Submit
                </Button>
            </Form>
        </div>)
    }
}

AddMenuItemForm.propTypes = {
    onNewMenuItemSubmit: PropTypes.func.isRequired
};
