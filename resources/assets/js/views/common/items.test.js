import Company from '../../../../assets/js/views/wizard/Company.vue';
import Counter from '../../../../assets/js/views/wizard/Counter.vue'
import { mount } from '@vue/test-utils';
import Item from './items';

describe('Item', () => {
    const wrapper = mount(Item);
    // Inspect the raw component options
    console.log(wrapper.vm.$options.methods);
});

function sum(a, b) {
  return a + b;
}

test('adds 1 + 2 to equal 3', () => {
  expect(sum(1, 2)).toBe(3);
});