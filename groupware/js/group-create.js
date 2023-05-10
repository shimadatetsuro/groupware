const memberList = document.getElementById('member-list');
const groupMembers = document.getElementById('group-members');
const addBtn = document.getElementById('add-btn');
const removeBtn = document.getElementById('remove-btn');
const searchInput = document.getElementById('search-input');

let members = Array.from(memberList.options);
let groupMemberList = [];

// メンバーリストを検索してフィルタリングする関数
const filterMembers = (query) => {
    memberList.innerHTML = '';
    const filteredMembers = members.filter((member) => {
        return member.text.toLowerCase().includes(query.toLowerCase());
    });
    filteredMembers.forEach((member) => {
        memberList.add(member);
    });
};

searchInput.addEventListener('input', () => {
    filterMembers(searchInput.value);
});

addBtn.addEventListener('click', () => {
    const selectedMembers = Array.from(memberList.selectedOptions);
    selectedMembers.forEach((member) => {
        if (!groupMemberList.includes(member.value)) {
            groupMembers.add(new Option(member.value, member.value));
            groupMemberList.push(member.value);
        }
    });
});

removeBtn.addEventListener('click', () => {
    const selectedGroupMembers = Array.from(groupMembers.selectedOptions);
    selectedGroupMembers.forEach((member) => {
        groupMemberList.splice(groupMemberList.indexOf(member.value), 1);
    });
    while (groupMembers.selectedOptions.length > 0) {
        groupMembers.remove(groupMembers.selectedIndex);
    }
});
