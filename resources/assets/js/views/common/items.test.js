import Company from '../../../../assets/js/views/wizard/Company.vue'
import Item from './items';

jest.mock('./items', () => ({
  doSomething: jest.fn()
}));


function sum(a, b) {
  return a + b;
}

test('adds 1 + 2 to equal 3', () => {
  expect(sum(1, 2)).toBe(3);
});