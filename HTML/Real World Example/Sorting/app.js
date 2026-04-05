/* app.js - OOP visual sorting with immediate number-update swaps
   - VisualArray: manages values + rendering to the .num-box elements
   - Sorter: static methods for bubble, selection, insertion, merge, quick
   - App: wiring UI -> visualizer
*/

class VisualArray {
  constructor(container) {
    this.container = container;
    this.values = [];
  }

  addNumber(num) {
    this.values.push(num);
    this.render();
  }

  setValues(arr) {
    this.values = arr.slice();
    this.render();
  }

  clear() {
    this.values = [];
    this.render();
  }

  // Renders boxes and applies highlight/swap classes for indices
  render(highlights = [], swaps = []) {
    this.container.innerHTML = '';
    this.values.forEach((val, idx) => {
      const el = document.createElement('div');
      el.className = 'num-box';
      el.textContent = val;
      if (highlights.includes(idx)) el.classList.add('highlight');
      if (swaps.includes(idx)) el.classList.add('swap');
      this.container.appendChild(el);
    });
  }
}

class Sorter {
  static sleep(ms) { return new Promise(r => setTimeout(r, ms)); }

  // Bubble sort with immediate swap visual
  static async bubble(arr, render, ascend, show, speed) {
    const n = arr.length;
    for (let i = 0; i < n - 1; i++) {
      let swapped = false;
      for (let j = 0; j < n - i - 1; j++) {
        if (show) render([j, j+1]);
        if (show) await this.sleep(speed);

        const cond = ascend ? arr[j] > arr[j+1] : arr[j] < arr[j+1];
        if (cond) {
          // swap values
          [arr[j], arr[j+1]] = [arr[j+1], arr[j]];
          swapped = true;
          // Immediately render to show new numbers and mark swap indices briefly
          if (show) render([], [j, j+1]);
          if (show) await this.sleep(Math.max(80, speed * 0.6));
        }
      }
      if (!swapped) break;
    }
    render();
  }

  // Selection sort with immediate swap render
  static async selection(arr, render, ascend, show, speed) {
    for (let i = 0; i < arr.length; i++) {
      let target = i;
      for (let j = i + 1; j < arr.length; j++) {
        if (show) render([target, j]);
        if (show) await this.sleep(speed * 0.6);
        const cond = ascend ? arr[j] < arr[target] : arr[j] > arr[target];
        if (cond) target = j;
      }
      if (target !== i) {
        [arr[i], arr[target]] = [arr[target], arr[i]];
        if (show) render([], [i, target]);
        if (show) await this.sleep(Math.max(80, speed * 0.6));
      }
    }
    render();
  }

  // Insertion sort with immediate placement visual
  static async insertion(arr, render, ascend, show, speed) {
    for (let i = 1; i < arr.length; i++) {
      let key = arr[i];
      let j = i - 1;
      while (j >= 0 && ((ascend && arr[j] > key) || (!ascend && arr[j] < key))) {
        arr[j + 1] = arr[j];
        if (show) render([j, j+1], [j, j+1]);
        if (show) await this.sleep(Math.max(80, speed * 0.45));
        j--;
      }
      arr[j + 1] = key;
      if (show) render([], [j+1]);
      if (show) await this.sleep(Math.max(80, speed * 0.45));
    }
    render();
  }

  // Merge sort — visualized by writing merged segments back into arr and rendering
  static async mergeSort(arr, render, ascend, show, speed) {
    async function merge(a, l, m, r) {
      const left = a.slice(l, m + 1);
      const right = a.slice(m + 1, r + 1);
      let i = 0, j = 0, k = l;
      while (i < left.length && j < right.length) {
        if (show) render([k], []);
        await Sorter.sleep(speed * 0.4);
        const takeLeft = ascend ? left[i] <= right[j] : left[i] >= right[j];
        if (takeLeft) {
          a[k++] = left[i++];
        } else {
          a[k++] = right[j++];
        }
        if (show) { render([], [k-1]); await Sorter.sleep(Math.max(60, speed*0.35)); }
      }
      while (i < left.length) {
        a[k++] = left[i++];
        if (show) { render([], [k-1]); await Sorter.sleep(Math.max(60, speed*0.35)); }
      }
      while (j < right.length) {
        a[k++] = right[j++];
        if (show) { render([], [k-1]); await Sorter.sleep(Math.max(60, speed*0.35)); }
      }
    }

    async function recurse(a, l, r) {
      if (l >= r) return;
      const m = Math.floor((l + r) / 2);
      await recurse(a, l, m);
      await recurse(a, m + 1, r);
      await merge(a, l, m, r);
    }

    await recurse(arr, 0, arr.length - 1);
    render();
  }

  // Quick sort with partition visualizing swaps
  static async quickSort(arr, render, ascend, show, speed) {
    async function partition(a, low, high) {
      const pivot = a[high];
      let i = low - 1;
      for (let j = low; j <= high - 1; j++) {
        if (show) render([j, high]);
        if (show) await Sorter.sleep(speed * 0.45);
        const cond = ascend ? a[j] <= pivot : a[j] >= pivot;
        if (cond) {
          i++;
          if (i !== j) {
            [a[i], a[j]] = [a[j], a[i]];
            if (show) { render([], [i, j]); await Sorter.sleep(Math.max(70, speed*0.45)); }
          }
        }
      }
      if (i + 1 !== high) {
        [a[i+1], a[high]] = [a[high], a[i+1]];
        if (show) { render([], [i+1, high]); await Sorter.sleep(Math.max(80, speed*0.45)); }
      }
      return i + 1;
    }

    async function qs(a, low, high) {
      if (low < high) {
        const pi = await partition(a, low, high);
        await qs(a, low, pi - 1);
        await qs(a, pi + 1, high);
      }
    }

    await qs(arr, 0, arr.length - 1);
    render();
  }
}

class App {
  constructor() {
    this.visual = new VisualArray(document.getElementById('arrayContainer'));
    this.bindUI();
  }

  bindUI() {
    document.getElementById('addBtn').addEventListener('click', () => this.addNumber());
    document.getElementById('randomBtn').addEventListener('click', () => this.randomFill());
    document.getElementById('clearBtn').addEventListener('click', () => this.clear());
    document.getElementById('sortBtn').addEventListener('click', () => this.sort());
    document.getElementById('numberInput').addEventListener('keydown', (e) => {
      if (e.key === 'Enter') this.addNumber();
    });
  }

  addNumber() {
    const input = document.getElementById('numberInput');
    const val = parseInt(input.value);
    if (!Number.isNaN(val)) {
      this.visual.addNumber(val);
      input.value = '';
      input.focus();
    }
  }

  randomFill() {
    const n = Math.min(12, Math.max(3, Math.round(Math.random() * 9) + 3));
    const arr = Array.from({length:n}, ()=> Math.floor(Math.random()*100));
    this.visual.setValues(arr);
  }

  clear() {
    this.visual.clear();
  }

  async sort() {
    const method = document.getElementById('sortMethod').value;
    const order = document.getElementById('order').value === 'asc';
    const show = document.getElementById('showProcess').value === 'yes';
    const speed = parseInt(document.getElementById('speedRange').value, 10) || 350;

    // Snapshot of current values
    const arr = [...this.visual.values];

    const render = (highlights = [], swaps = []) => {
      this.visual.values = arr.slice(); // keep visual in sync with arr
      this.visual.render(highlights, swaps);
    };

    // disable UI while sorting
    this.toggleUI(false);

    try {
      if (method === 'bubble') await Sorter.bubble(arr, render, order, show, speed);
      else if (method === 'selection') await Sorter.selection(arr, render, order, show, speed);
      else if (method === 'insertion') await Sorter.insertion(arr, render, order, show, speed);
      else if (method === 'merge') await Sorter.mergeSort(arr, render, order, show, speed);
      else if (method === 'quick') await Sorter.quickSort(arr, render, order, show, speed);
      // final write-back & render
      this.visual.setValues(arr);
    } catch (err) {
      console.error('Sorting interrupted', err);
    }

    this.toggleUI(true);
  }

  toggleUI(enabled) {
    const controls = ['addBtn','randomBtn','clearBtn','sortBtn','sortMethod','order','showProcess'];
    controls.forEach(id => {
      const el = document.getElementById(id);
      if (el) el.disabled = !enabled;
    });
    // speed and number input remain usable while sorting is disabled (optional)
  }
}

window.addEventListener('DOMContentLoaded', () => {
  window.app = new App();
});
