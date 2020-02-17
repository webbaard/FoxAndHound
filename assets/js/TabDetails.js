import React from 'react';
import PropTypes from 'prop-types';
import {Button, Card, ListGroup} from "react-bootstrap";

export default function TabDetails(props){
    const { tabDetails, menuList, onAddToTab, onPayTab } = props;
    if (!tabDetails.data) {
        return (<p>Loading Data</p>)
    }
    return (<div className="tabdetails">
        <Card className="centeralign">
            <Card.Header as="h3">
                {tabDetails.data.customer}
            </Card.Header>
            <Card.Body>
                <p>Id : {tabDetails.data.id}</p>
                <p>Total amount outstanding: {tabDetails.data.amount_outstanding / 100}</p>
                <p>Tab opened on : {tabDetails.data.opened_on}</p>
                {tabDetails.data.paid_on ? (
                    <p>Tab was Paid on: {tabDetails.data.paid_on}</p>
                ) : (
                    <Button variant="danger" onClick={() => onPayTab(tabDetails.data.id)}>
                        Pay Tab
                    </Button>
                )}
            </Card.Body>
            <ListGroup>
                {menuList.data.map(item =>
                    <Button variant="secondary" onClick={() => onAddToTab(tabDetails.data.id, item.name, item.price)}>
                        Add a {item.name} - ({item.price / 100})
                    </Button>
                )}
            </ListGroup>
        </Card>
    </div>)
}

TabDetails.propTypes = {
    tabDetails: PropTypes.object.isRequired,
    menuList: PropTypes.object.isRequired,
    onAddToTab: PropTypes.func.isRequired,
    onPayTab: PropTypes.func.isRequired
};
