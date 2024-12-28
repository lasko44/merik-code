// Import the module and mock any dependencies if necessary
import actions from "@/Pages/ComponentLibrary/Store/actions.js";

describe('actions module', () => {
    let testPath, testFileName;

    beforeEach(() => {
        // Set up initial test data
        testPath = ['folder1/', 'folder2/'];
        testFileName = 'file.txt';
        actions.pathArr = [];
        actions.path = '';
    });

    test('updatePath correctly updates pathArr and path', () => {
        actions.updatePath(testPath, testFileName);

        expect(actions.pathArr).toEqual(testPath);
        expect(actions.path).toBe('folder1/folder2/file.txt');
    });

    test('buildPath correctly constructs path string', () => {
        const result = actions.updatePath(['a/', 'b/'], 'c.txt');
        expect(actions.path).toBe('a/b/c.txt');
    });

    test('buildPath returns empty string if path or fileName is missing', () => {
        actions.updatePath([], '');
        expect(actions.path).toBe('');

        actions.updatePath(['folder1/'], '');
        expect(actions.path).toBe('');

        actions.updatePath([], 'file.txt');
        expect(actions.path).toBe('');
    });
});
