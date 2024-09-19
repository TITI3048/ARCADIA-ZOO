const request = require('supertest');
const app = require('../app');
const { expect } = require('chai');

describe('GET /zoo/animals', () => {
    it('should return a list of animals', (done) => {
        request(app)
            .get('/zoo/animals')
            .end((err, res) => {
                expect(res.status).to.equal(200);
                expect(res.body).to.be.an('array');
                expect(res.body).to.have.lengthOf(3);
                expect(res.body[0]).to.have.property('name', 'Lion');
                done();
            });
    });
});